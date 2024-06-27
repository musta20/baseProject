<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\loginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public $ADMIN = 'Admin';
    public $MANGER = 'Manager';
    public $WORKER = 'employee';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get()->reverse();

        return view('admin.users.add', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate($this->Rule, $this->messages());

        if ($request->hasFile('img')) {
            $$user['img'] = $request->file('img')->store('userimg', 'public');
        }

        $user['password'] = Hash::make($request->password);

        $role = Role::findById($request['role']);

        $user = User::create($user);

        $user->assignRole($role);

        return redirect()->route('admin.usersList')->with('OkToast', 'تم إضافة المستخدم');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {

        $role = Role::get()->reverse();

        return view('admin.users.edit', ['user' => $User, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $User)
    {

        if ($request->hasFile('img')) {
            $User->img = $request->file('img')->store('userimg', 'public');
        }

        if ($request->password) {
            $request->validate($this->PasswordRule, $this->messages());
            $User->password = Hash::make($request->password);
        }

        $User->name = $request->name;
        $User->email = $request->email;
        $roles = Role::all();

        if ($User->hasAnyRole($roles)) {
            $User->removeRole($User->getRoleNames()[0]);
        }
        foreach ($roles as $item) {

            if ($item->id == $request['role']) {
                $User->assignRole($item->name);

            }
        }

        $User->save();

        return redirect()->route('admin.usersList')->with('OkToast', 'تم تعديل الموظف');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.usersList')->with('OkToast', 'تم حذف العنصر');
    }

    public function usersList()
    {
        // $locale = App::currentLocale();

        $allRole = Role::all();

        $filterBox = User::showFilter(realData: $allRole, relType: 'roles', relName: 'الصلاحية');

        $Users = User::Filter()->with('roles')->requestPaginate();

        return view('admin.users.index', [
            'Users' => $Users,
            'filterBox' => $filterBox,
            'allRole' => $allRole]);
    }

    public function loginView()
    {
        //
        if (Auth::user()) {
            return redirect('admin/');
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public function login(loginRequest $credentials)
    {

        if ($credentials->authenticate()) {
            $credentials->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'كلمة المرور او البريد الالكتروني غير صحيح',
        ])->onlyInput('email');
    }

    public function createUser(CreateUserRequest $request)
    {

        //$user = $request->validate($this->Rule, $this->messages());

        // $user = $request->all();
        $request['password'] = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //   $user->givePermissionTo('edit articles');

        return redirect()->route('admin.usersList')->with('OkToast', 'تم إضافة المستخدم');
    }

    public function addpermison()
    {

        $TaskMangment = Permission::create(['name' => 'Search']);

        return 'new perm added';
    }

    public function createAllPerm()
    {

        // $user = User::create(['email' => 'saif.muh2020@gmail.com', 'name' => 'مصطفى', 'password' => Hash::make('Aa@123456')]);

        //  $user->assignRole($this->ADMIN);

        return '<h1>all perm added and admin created</h1>';
    }

    public function addPerm(Request $request)
    {
        $allRolToP = $request->all();
        $removed = array_shift($allRolToP);

        foreach ($allRolToP as $key => $va) {

            $toRole = json_decode($key);

            $Role = Role::find($toRole->permRole->role);
            $perm = Permission::find($toRole->permRole->perm);

            if ($va) {

                $Role->givePermissionTo($perm);

            } else {

                $Role->revokePermissionTo($perm);

            }

        }

        return redirect()->route('admin.perm')->with('OkToast', 'تعديل الصلاحيات');

    }

    public function indexrole()
    {
        $role = Role::all();

        return view('admin.users.role.index', ['role' => $role]);
    }

    public function rmrole(Role $role)
    {

        //  $role = $request->validate(['role'=>"required|string|max:100|min:3"], $this->messages());
        //  Role::create(['name' => $role['role']]);
        if ($role->name == $this->ADMIN) {
            return redirect()->route('admin.perm')->with('OkToast', 'لا يمكن حذف المدير   ');

        }
        $role->delete();

        return redirect()->route('admin.perm')->with('OkToast', 'تم حذ العنصر ');

    }

    public function addrole(Request $request)
    {
        $role = $request->validate(['role' => 'required|string|max:100|min:3'], $this->messages());
        Role::create(['name' => $role['role']]);

        return redirect()->route('admin.perm')->with('OkToast', 'تم اضافة الصلاحية');

    }

    public function perm()
    {
        $role = Role::all();
        $perm = Permission::all();

        return view('admin.users.perm', ['role' => $role, 'perm' => $perm]);
    }
}

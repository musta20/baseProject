<?php

namespace App\Http\Controllers;

use App\Models\setting;
use App\Models\User;
use Illuminate\Http\Request;
use  App\Models\Role;
use  App\Models\Permission;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class UsersController extends Controller
{

    public $Rule =  [
        "email" => "unique:users|required|email|max:255|min:3",
        "password" => "required|string|max:25|min:6",
        "name" => "required|string|max:100|min:3",
        "role" => "required|integer|digits_between:1,3",
        'img' => 'max:2048|mimes:jpg,jpeg,png'

    ];

    public $UpDateRule =  [
        "email" => "required|email|max:255|min:3",
        "name" => "required|string|max:100|min:3",
        "role" => "required|integer|digits_between:1,3",
        'img' => 'max:2048|mimes:jpg,jpeg,png'

    ];

    public $PasswordRule =  [
        "password" => "required|string|max:25|min:6"
    ];


    public $LogInRule =  [
        "email" => "required|email|max:255|min:3",
        "password" => "required|string|max:25|min:6",
    ];



    public function messages()
    {
        return [


            'role.required' => 'يجب  تحديد الصلاحية ',
            'role.integer' => 'يجب ان تكون الصلاحية رقم',
            "role.digits_between" => "الصلاحية يجب ان تكون بين 1-3",

            'email.required' => ' يجب كتابة البريد الالكتروني ',
            'email.email' => ' ليس بريد الالكتروني',
            "email.unique" => " بريد الالكتروني مسجل مسبقا",
            "email.max" => " يجب ان لا يزيد بريد الالكتروني  عن 25 حرف ",
            "email.min" => " يجب ان لا يقل بريد الالكتروني عن 3 حرف ",

            'password.required' => 'يجب كتابة كلمة المرور ',
            'password.string' => 'يجب ان يكون كلمة المرور نص فقط',
            "password.max" => "يجب ان لا يزيد  كلمة المرور عن 25 حرف",
            "password.min" => "يجب ان لا يقل  كلمة المرور عن 3 حرف",

            'name.required' => 'يجب كتابة الاسم ',
            'name.string' => 'يجب ان يكون الاسم نص فقط',
            "name.max" => "يجب ان لا يزيد الاسم  عن 25 حرف",
            "name.min" => "يجب ان لا يقل الاسم عن 3 حرف",

            'img.mimes' => 'الملف يجب ان يكون صورة فقط',
            "img.max" => "يجب ان لا يزيد   عن 25 م",
        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.users.main");
    }




    public function UsersList()
    {
        $locale = App::currentLocale();

        $Users = User::latest()->with('roles')->paginate(10);
        $allRole = Role::all();
        return view("admin.users.index", ['Users' => $Users,'allRole'=>$allRole]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get()->reverse();
        return view("admin.users.add", ['role' => $role]);
    }


    public function loginView()
    {
      //
         if(Auth::user()){
            return redirect('admin/');
        } 
        return view("auth.login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public function login(Request $request)
    {


        // dd(  $this->Rule );
        $credentials = $request->validate($this->LogInRule, $this->messages());
        //   dd( $credentials );
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'كلمة المرور او البريد الالكتروني غير صحيح',
        ])->onlyInput('email');
    }


    public function createUser(Request $request)
    {

        $user = $request->validate($this->Rule, $this->messages());

        // $user = $request->all();
        $user['password'] = Hash::make($request->password);

        $user = User::create($user);

        $user->givePermissionTo('edit articles');

        return redirect('/admin/Users')->with('messages', 'تم إضافة المستخدم');
    }
public function addpermison()
{
  //  Permission::create(['name' => 'Logs']);
  //  Permission::create(['name' => 'Employee']);
 //  Permission::create(['name' => 'Reviews']);
 $TaskMangment = Permission::create(['name' => 'Search']);
 //$Admin = Role::create(['name' => $this->ADMIN]);
 //$Admin->givePermissionTo($TaskMangment);

    return "new perm added";
}

    public $ADMIN = 'Admin';
    public $MANGER = 'Manager';
    public $WORKER = 'employee';

    

    public function createAllPerm()
    {
      
        

       // $user = User::create(['email' => 'saif.muh2020@gmail.com', 'name' => 'مصطفى', 'password' => Hash::make('Aa@123456')]);

      //  $user->assignRole($this->ADMIN);


        return ("<h1>all perm added and admin created</h1>");
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate($this->Rule, $this->messages());
       // $slide->img =  $request->file('img')->store('logo','public');
    if($request->hasFile('img'))
    {
        $$user['img'] =  $request->file('img')->store('userimg','public');
    }
        // $user = $request->all();
        $user['password'] = Hash::make($request->password);

        $role= Role::findById($request['role']);

        $user = User::create($user);

        $user->assignRole( $role);
   

        return redirect('/admin/UsersList')->with('messages', 'تم إضافة المستخدم');
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
    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::get()->reverse();

        return view("admin.users.edit",  ['user' => $user, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user  = User::find($id);

        $request->validate(
            [
                'email' => 'unique:users,email,' . $id,
                "name" => "required|string|max:100|min:3",
                "role" => "required|integer|digits_between:1,3"
            ],
            $this->messages()
        );
        if($request->hasFile('img'))
        {
            $user->img =  $request->file('img')->store('userimg','public');
        }
       // dd($request->password);
        if ($request->password) {
            $request->validate($this->PasswordRule, $this->messages());
            $user->password =  Hash::make($request->password);
        }

        //$user->

        $user->name =  $request->name;
        $user->email =  $request->email;
        $roles = Role::all();

       if( $user->hasAnyRole($roles)){
        $user->removeRole($user->getRoleNames()[0]);
       }
        foreach ($roles as $item) {

           if($item->id == $request['role']) {
            $user->assignRole($item->name);

           }
        }


        $user->save();

        return redirect('/admin/UsersList')->with('messages', 'تم تعديل الموظف');
    }

    public function addPerm(Request $request)
    {
      //  dd($request->all());
        $allRolToP =$request->all();
        $removed = array_shift($allRolToP);
     //  dd($allRolToP);

        foreach ( $allRolToP as $key=>$va ) {
           // dd($allRolToP);
          $toRole=json_decode($key);
          $Role=Role::findById($toRole->permRole->role);
          $perm=Permission::findById($toRole->permRole->perm);

          if($va){
            
   
          $Role->givePermissionTo($perm);

          
          }else{

            

            $Role->revokePermissionTo($perm);

          }
            
        }

        return redirect('/admin/perm')->with('messages', 'تعديل الصلاحيات');

    }

   

    public function  indexrole()
    {
        $role =Role::all();
        return view("admin.users.role.index",['role'=>$role]);
    }
    
    public function rmrole($id)
    {
        $role =Role::findById($id);
      //  $role = $request->validate(['role'=>"required|string|max:100|min:3"], $this->messages());
      //  Role::create(['name' => $role['role']]);
      if( $role->name ==$this->ADMIN){
        return redirect('/admin/perm')->with('messages', 'لا يمكن حذف المدير   ');

      }
      $role->delete();
        return redirect('/admin/perm')->with('messages', 'تم حذ العنصر ');

    }

    public function addrole(Request $request)
    {
        $role = $request->validate(['role'=>"required|string|max:100|min:3"], $this->messages());
        Role::create(['name' => $role['role']]);
        return redirect('/admin/perm')->with('messages', 'تم اضافة الصلاحية');

    }
    public function Perm()
    {
        $role = Role::all();
        $perm = Permission::all();
      return view('admin.users.perm',['role'=>$role,'perm'=> $perm ]);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/UsersList/')->with('messages', 'تم حذف العنصر');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login']);
    }

    public function index(Request $request)
    {
        $allRoles = Role::all();

        $filterBox = User::showFilter(realData: $allRoles, relType: 'roles', relName: 'الصلاحية');
        $users = User::Filter()->with('roles')->requestPaginate();

        return response()->json(['users' => $users, 'filter' => $filterBox]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('userimg', 'public');
        }

        $user = User::create($data);
        $user->assignRole($request->role);

        return response()->json(['message' => 'User created successfully.', 'user' => $user], 201);
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('userimg', 'public');
        }

        if ($request->has('password') && $request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $roles = Role::all();
        $user->roles()->sync($request->role);

        return response()->json(['message' => 'User updated successfully.', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['message' => 'Login successful.', 'token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials.'], 401);
    }
}

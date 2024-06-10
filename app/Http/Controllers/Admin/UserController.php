<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $role_id = $request->input('role_id');
        $roles = Role::all();

        if ($role_id) {
            $users = User::whereHas('roles', function ($query) use ($role_id) {
                $query->where('role_id', $role_id);
            })->with('roles')->get();
        } else {
            $users = User::with('roles')->get();
        }

        return view('admin.users.index', compact('users', 'roles', 'role_id'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id'
    ]);

    // Menggunakan create untuk membuat user baru
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    // Menambahkan role ke user yang baru dibuat
    $user->roles()->attach($data['role_id']);

    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id'
    ]);

    $user->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password'] ? bcrypt($data['password']) : $user->password,
    ]);

    // Menggunakan sync untuk mengatur peran
    $user->roles()->sync([$data['role_id']]); // Menggunakan role_id

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan sudah ada model User
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function index()
  {
    $users = User::all();
    // dd($users);
    return view('admin.user', compact('users'));
  }


  public function create()
  {
    return view('user.create');
  }


  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8',
      'role' => 'required',
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
  }


  public function edit(User $user)
  {
    return view('user.edit', compact('user'));
  }


  public function update(Request $request, User $user)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
      'role' => 'required|in:provinsi,kota',
    ]);

    if ($request->password) {
      $request->validate([
        'password' => 'string|min:8',
      ]);
      $user->update([
        'password' => Hash::make($request->password),
      ]);
    }

    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('success', 'Pengguna berhasil diupdate.');
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
  }
}

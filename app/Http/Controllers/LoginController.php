<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function show()
  {
    if (Auth::check()) {
      return redirect()->intended();
    }
    return view('admin.login');
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
      return redirect()->route('login')
        ->withErrors(['email' => trans('auth.failed')]);
    }

    $user = Auth::user();

    // Redirect based on user role
    if ($user->role === 'provinsi') {
      return redirect()->route('provinsi.objek-wisata');
    } else {
      return redirect()->route('kota.objek-wisata');
    }
  }
}

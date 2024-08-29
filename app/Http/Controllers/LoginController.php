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

  public function login(LoginRequest $request)
  {
    $credentials = $request->getCredentials();

    if (!Auth::validate($credentials)) {
      return redirect()->to('login')
        ->withErrors(trans('auth.failed'));
    }

    $user = Auth::getProvider()->retrieveByCredentials($credentials);
    Auth::login($user);

    return $this->authenticated($request, $user);
  }

  protected function authenticated(Request $request, $user)
  {
    if ($user->role === 'provinsi') {
      return redirect()->route('admin.objek-wisata');
    } elseif ($user->role === 'kota') {
      return redirect()->route('kota.objek-wisata');
    } else {
      return redirect()->intended();
    }
  }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('Admin.login');
  }

  /**
   * Handle an authentication attempt.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function admin_login(Request $request)
  {
    $credentials = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    $is_admin = DB::table('users')->where('username', $request['username'])->value('is_admin');

    if ($is_admin) {
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/evoting/admin/');
      }

      return back()->withErrors([
        'error' => 'Username atau password salah.',
      ]);
    }
    return back()->withErrors([
      'error' => "Username tidak ditemukan. Hanya admin yang dapat masuk",
    ]);
  }
  /**
   * Handle an authentication attempt.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function user_login(Request $request)
  {
    $credentials = $request->validate([
      'username' => ['required', 'exists:users'],
      'password' => ['required'],
    ], [
      'username.exists' => ' tidak ditemukan'
    ]);

    $is_admin = !DB::table('users')->where('username', $request['username'])->value('is_admin');

    if ($is_admin) {
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/evoting/');
      }

      return back()->withErrors([
        'password' => 'Password salah',
      ]);
    }
    return back()->withErrors([
      'error' => "User ini tidak diperkenankan login.",
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    if ($request->admin) return redirect('/evoting/admin/login');
    else return redirect()->intended('/evoting/login');
  }
}

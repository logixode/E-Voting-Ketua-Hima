<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuthentication
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    if (!auth()->user()) {
      return redirect('/evoting/login');
    } else if (!auth()->user()->is_admin) {
      return $next($request);
    } else return redirect('/evoting');
  }
}

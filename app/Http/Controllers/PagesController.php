<?php

namespace App\Http\Controllers;

use App\Models\Votings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PagesController extends Controller
{
  public function index()
  {
    $candidates = DB::table('candidates')->orderBy('no', 'asc')->get();
    $already_voted = DB::table('votings')->where('votings.user_id', '=', auth()->user()->id)->get();
    
    return Inertia::render('Home', [
      "user" => auth()->user(),
      "candidates" => $candidates,
      "already_voted" => $already_voted,
      'csrf_token' => csrf_token()
   ]);
  }
  public function login()
  {
    return Inertia::render('Login', [
      'done' => isset($_GET['done']),
      'csrf_token' => csrf_token()
   ]);
  }
  public function vote(Request $request)
  {
    $validate = $request->validate([
      'user_id' => 'required',
      'candidate_id' => 'required',
      'device' => 'required',
    ]);

    $already_voted = DB::table('votings')->where('votings.user_id', '=', auth()->user()->id)->get();
    $already_voted = reset($already_voted);
    if (empty($already_voted))
      Votings::create([
        'user_id' => $request->user_id,
        'candidate_id' => $request->candidate_id,
        'device' => $request->device,
      ]);
    
      return redirect()->intended('/evoting/');

    // Auth::logout();
    // $request->session()->invalidate();
    // $request->session()->regenerateToken();
    
    // return redirect()->intended('/evoting/login?done=true');
  }
}

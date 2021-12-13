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
    date_default_timezone_set('Asia/Jakarta');
    $candidates = DB::table('candidates')->orderBy('no', 'asc')->get();
    $already_voted = DB::table('votings')->where('votings.user_id', '=', auth()->user()->id)->get();
    
    $start_date = "2021-12-14 08:00";
    $end_date = "2021-12-14 15:00";
    $date_check = date('d-m-Y H:i:s');

    $is_open = false;

    if (check_in_range($start_date, $end_date, $date_check)) {
      $is_open = true;
    }
    
    return Inertia::render('Home', [
      "user" => auth()->user(),
      "candidates" => $candidates,
      "already_voted" => $already_voted,
      "voting_date" => [
        'is_open' => $is_open,
        'start_date' => $start_date,
        'end_date' => $end_date,
      ],
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

    $start_date = "2021-12-14 08:00";
    $end_date = "2021-12-14 15:00";
    $date_check = date('d-m-Y H:i:s');

    if (check_in_range($start_date, $end_date, $date_check)) {
      $already_voted = DB::table('votings')->where('votings.user_id', '=', auth()->user()->id)->get();
      $already_voted = reset($already_voted);
      if (empty($already_voted))
        Votings::create([
          'user_id' => $request->user_id,
          'candidate_id' => $request->candidate_id,
          'device' => $request->device,
        ]);
    }
    
    return redirect()->intended('/evoting/');
  }
}

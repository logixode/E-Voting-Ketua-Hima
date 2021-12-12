<?php

namespace App\Http\Controllers;

use App\Models\Votings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PagesController extends Controller
{
  public function index()
  {
    $candidates = DB::table('candidates')->orderBy('no', 'asc')->get();
    return Inertia::render('Home', [
      "user" => auth()->user(),
      "candidates" => $candidates,
      'csrf_token' => csrf_token()
   ]);
  }
  public function login()
  {
    return Inertia::render('Login', [
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

    Votings::create([
      'user_id' => $request->user_id,
      'candidate_id' => $request->candidate_id,
      'device' => $request->device,
    ]);

    return response('Data berhasil dikirim', 200)->header('Content-Type', 'text/plain');
  }
}

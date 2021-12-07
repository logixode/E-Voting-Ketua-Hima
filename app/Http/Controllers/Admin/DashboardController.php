<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    return view('Admin.dashboard', ['title' => 'Dashboard']);
  }
  public function voting_data()
  {
    $voting_data = DB::table('votings')->get();
    return view('Admin.voting_data', [
      'title' => 'Perolehan Suara',
      'voting_data' => $voting_data
    ]);
  }
}

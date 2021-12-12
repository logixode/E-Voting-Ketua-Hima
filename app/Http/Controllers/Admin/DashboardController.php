<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index()
  {
    $total_user = DB::table('users')->where('users.username', '<>', 'admin')->count();
    $total_candidate = DB::table('candidates')->count();
    $total_voting_data = DB::table('votings')->count();
    $golput = ($total_voting_data == 0 || $total_user == 0 ) 
                ? 100 
                : ($total_voting_data / $total_user) * 100;
    
    return view('Admin.dashboard', [
      'title' => 'Dashboard',
      'total_user' => $total_user,
      'total_candidate' => $total_candidate,
      'total_voting_data' => $total_voting_data,
      'golput' => $golput,
    ]);
  }
  public function voting_data()
  {
    $candidates = DB::table('candidates')->orderBy('no', 'asc')->get();
    $voting_data = DB::table('votings')->get();
    $candidate_data = [];
    foreach ($voting_data as $key => $data) {
      array_push($candidate_data, $data->candidate_id);
    }
    $candidate_data = array_count_values($candidate_data);
    $percentage = $candidate_data;
    foreach ($percentage as $key => $data) {
      $percentage[$key] = count($voting_data) == 0 
                            ? 0 
                            : number_format((($data / count($voting_data)) * 100), 2);
    }
    return view('Admin.voting_data', [
      'title' => 'Perolehan Suara',
      'dataTables' => true,
      'voting_data' => $voting_data,
      'candidates' => $candidates,
      'percentage' => $percentage,
    ]);
  }
}

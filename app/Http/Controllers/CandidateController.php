<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CandidateController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $candidates = DB::table('candidates')->orderBy('no', 'asc')->get();
    return view('Admin/candidate/index', [
      'title' => 'Kandidat',
      'dataTables' => true,
      'candidates' => $candidates
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validate = $request->validate([
      'no' => 'required',
      'name' => 'required',
      'class' => 'required',
      'profile_picture' => 'required',
      'visi' => 'required',
      'misi' => 'required'
    ]);

    try {
      // $imageName = time().'.'.$request->profile_picture->extension();  
      // $request->profile_picture->move(public_path('assets/img/'), $imageName);
      $imageName = $request->file('profile_picture');
      $imageName->move(public_path('assets/img/'), $imageName->getClientOriginalName());
    } catch (Throwable $e) {
      return redirect()->back()->withErrors('error', $e->getMessage());
    }

    DB::table('candidates')->insert([
      'no' => $request->no,
      'name' => $request->name,
      'class' => $request->class,
      'profile_picture' => '/assets/img/' . $imageName->getClientOriginalName(),
      'visi' => $request->visi,
      'misi' => $request->misi,
    ]);
        
    return redirect()->back()->with('success', 'Data berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validate = $request->validate([
      'no' => 'required',
      'name' => 'required',
      'class' => 'required',
      'profile_picture' => 'required',
      'visi' => 'required',
      'misi' => 'required'
    ]);

    DB::table('candidates')
      ->where('id', $id)
      ->update([
        'no' => $request->no,
        'name' => $request->name,
        'class' => $request->class,
        'profile_picture' => $request->profile_picture,
        'visi' => $request->visi,
        'misi' => $request->misi
      ]);

    return redirect()->back()->with('success', 'Data berhasil diupdate');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $candidate = DB::table('candidates')->where('id', '=', $id)->first();
    $imageName = $candidate->profile_picture;
    try {
      if ($imageName)
        unlink(public_path($imageName));
    } catch (Throwable $e) {
      return redirect()->back()->withErrors('error', $e->getMessage());
    }
    DB::table('candidates')->where('id', '=', $id)->delete();

    return redirect()->back()->with('success', 'Data berhasil dihapus');
  }
}

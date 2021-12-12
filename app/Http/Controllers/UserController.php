<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = DB::table('users')->get();
    return view('Admin/user/index', [
      'title' => 'User',
      'dataTables' => true,
      'users' => $users
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
      'username' => 'required|unique:users,username',
      'name' => 'required|string',
      'class' => 'required',
      'email' => 'required|unique:users,email',
      'password' => 'required'
    ]);

    DB::table('users')->insert([
      'username' => $request->username,
      'name' => $request->name,
      'class' => $request->class,
      'email' => $request->email,
      'password' => Hash::make($request->password)
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
      'username' => 'required',
      'name' => 'required|string',
      'class' => 'required',
      'email' => 'required',
      'password' => 'required'
    ]);

    DB::table('users')
      ->where('id', $id)
      ->update([
        'username' => $request->username,
        'name' => $request->name,
        'class' => $request->class,
        'email' => $request->email,
        'password' => Hash::make($request->password)
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
    try {
      DB::table('users')->where('id', '=', $id)->delete();
    } catch (Throwable $e) {
      return redirect()->back()->withErrors('error', $e->getMessage());
    }

    return redirect()->back()->with('success', 'Data berhasil dihapus');
  }
}

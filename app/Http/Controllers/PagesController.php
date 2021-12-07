<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
  public function index()
  {
    return Inertia::render('Home', [
      "user" => auth()->user(),
      'csrf_token' => csrf_token()
   ]);
  }
  public function login()
  {
    return Inertia::render('Login', [
      'csrf_token' => csrf_token()
   ]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
  public function index()
  {
    return Inertia::render('Home');
  }
  public function about()
  {
    $title = 'About';
    return Inertia::render('About', ['title' => $title]);
  }
  public function admin()
  {
    return Inertia::render('Admin/index');
  }
  public function login()
  {
    return Inertia::render('Admin/Login');
  }
}

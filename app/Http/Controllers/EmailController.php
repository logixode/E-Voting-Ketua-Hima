<?php

namespace App\Http\Controllers;

use App\Mail\SendUserPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
  public function index(Request $request)
  {
    $body = [
      'title' => 'Username & Password Akun E-Voting Cakahim HMTI 2021',
      'username' => '361',
      'password' => '955',
    ];
    Mail::to('rkmd177@gmail.com')->send(new SendUserPasswordMail($body));
    return ['msg' => 'Sukses'];
  }
}

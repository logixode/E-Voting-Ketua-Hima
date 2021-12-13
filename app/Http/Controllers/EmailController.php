<?php

namespace App\Http\Controllers;

use App\Mail\SendUserPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
  public function index(Request $request)
  {
    $class = DB::table('users')
              ->where('users.username', '<>', 'admin')
              ->where('users.class', '=', $request->to)
              ->get();
    $user_password = DB::table('user_passwords')
              ->where('user_passwords.nim', '<>', 'admin')
              ->get();

              
    foreach ($class as $key => $val) {
        // echo '<br/><br/>';
      // if ($val->username == '361955401155') {
          // echo $val->username;
          // echo '<br/>'.$user;
        
        $password = $user_password->filter(function ($value, $key) use ($val) {
          return $value->nim == $val->username;
        });
        $password = reset($password);
        $password = $password[key($password)]->password;
        $body = [
          'title' => 'Username & Password Akun E-Voting Cakahim HMTI periode 2021-2022',
          'username' => $val->username,
          'name' => $val->name,
          'password' => $password,
        ];
        print_r($body);

        Mail::to($val->email)->send(new SendUserPasswordMail($body));
      // }
    }
    
    // $to = $request->to;
    // $send_to = $class->filter(function ($value, $key) use ($to) {
    //   return $value->class == $to;
    // });
    // $send_to = reset($send_to);
    // // $send_to = $send_to[key($send_to)];
    // if (!empty($send_to)) 
    // print_r($send_to);
    // return ['msg' => 'Sukses'];
  }
}

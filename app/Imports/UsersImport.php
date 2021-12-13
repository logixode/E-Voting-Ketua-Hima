<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class UsersImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    set_time_limit(1800);
    $row = array_filter($row);
    $row = array_diff($row, []);
    $random = str_shuffle('abcdefghjklmnopqrstuvwxyz234567890');
    $password = substr($random, 0, 6);

    // $datas = ['nim', 'nama', 'kelas', 'email'];
    // foreach ($row as $data) {
    //   if ($data == 'nim' || $data == 'nama' || $data == 'kelas' || $data == 'email')
    //     continue;
    //   // if (!empty($data)) 
    //     array_push($datas, $data);
    // }
    // echo count($row);
    // print_r($row);
    
    if (!empty($row) && $row != ['nim', 'nama', 'kelas', 'email']) {
      DB::table('user_passwords')->insert([
          'nim' => $row[0],
          'password' => $password
      ]);

      return new User([
        'username' => $row[0],
        'name' => $row[1],
        'class' => $row[2],
        'email' => $row[3],
        'password' => Hash::make($password)
      ]);
    }
  }
}

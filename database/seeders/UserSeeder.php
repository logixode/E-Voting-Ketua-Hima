<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert(
      [
        'username' => 'admin',
        'name' => 'admin',
        'email' => 'rkmd177@gmail.com',
        'password' => Hash::make('admin'),
        'is_admin' => true,
      ],
      [
        'username' => '361955401155',
        'name' => 'Rohmad Kurniadi',
        'class' => 'F',
        'email' => 'rohmad1230@gmail.com',
        'password' => Hash::make('admin'),
      ]
    );
  }
}

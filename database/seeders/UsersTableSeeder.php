<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Yanto Mulyanto',
            'email' => 'yanto@tomo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'role' => 'CAMABA',
        ]);
        DB::table('users')->insert([
            'name' => 'Xinta Kuxinta',
            'email' => 'xinta@tomo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
          'remember_token' => Str::random(10),
          'role' => 'CAMABA',
      ]);
      DB::table('users')->insert([
          'name' => 'administrator',
          'email' => 'administrator@tomo.com',
          'email_verified_at' => now(),
          'password' => Hash::make('12345678'),
          'remember_token' => Str::random(10),
          'role' => 'UNIVERSITAS',
      ]);

        //
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
          [
          'role_id' => '1',
          'name' =>'Carmic',
          'email' => 'carmic@admin.com',
          'password' => bcrypt('carmic123'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
        'role_id' => '1',
        'name' =>'System Admin',
        'email' => 'sys@admin.com',
        'password' => bcrypt('sysadmin123'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '2',
          'name' =>'Faisal',
          'email' => 'faisal@lptsi.com',
          'password' => bcrypt('faisal'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '3',
          'name' =>'Eko',
          'email' => 'eko@website.com',
          'password' => bcrypt('eko'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '3',
          'name' =>'Sigit',
          'email' => 'sigit@website.com',
          'password' => bcrypt('sigit'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '4',
          'name' =>'Cakku',
          'email' => 'cakku@asprak.com',
          'password' => bcrypt('asprak'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '4',
          'name' =>'Octgi',
          'email' => 'Octgi@asprak.com',
          'password' => bcrypt('asprak'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '5',
          'name' =>'John Doe',
          'email' => 'john@example.com',
          'password' => bcrypt('password'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [
          'role_id' => '5',
          'name' =>'Tatus',
          'email' => 'tatus@example.com',
          'password' => bcrypt('password'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]
      ]);
    }
}

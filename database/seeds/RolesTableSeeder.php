<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          [

          'role_name'=> 'Sys Admin',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [

          'role_name'=> 'LPTSI',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [

          'role_name'=> 'Web Admin',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [

          'role_name'=> 'Asisten Praktikum',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ],
        [

          'role_name'=> 'Praktikan',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]
      ]);
    }
}

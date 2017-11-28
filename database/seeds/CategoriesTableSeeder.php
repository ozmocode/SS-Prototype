<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        [
        'category_name'=> 'Cross Site Scripting (XSS)',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ],
        [
        'category_name'=> 'Sql Injection',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ],
        [
        'category_name'=> 'LFI',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ],
        [
        'category_name'=> 'RFI',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ],
        [
        'category_name'=> 'Cross Site Request Forgery (CSRF)',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]
]);
    }
}

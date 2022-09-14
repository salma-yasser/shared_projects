<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $nationalities=[
          ['name'=>"مواطن سعودي"],
          ['name'=>"مصري"],
          ['name'=>"أردني"]
      ];

      foreach ($nationalities as $key => $nationality) {
          DB::table('nationalities')->insert([
              'name'=>$nationality['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

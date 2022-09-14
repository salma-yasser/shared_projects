<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $bloodtypes=[
          ['name'=>"A+"],
          ['name'=>"A-"],
          ['name'=>"B+"],
          ['name'=>"B-"],
          ['name'=>"AB+"],
          ['name'=>"AB-"],
          ['name'=>"O+"],
          ['name'=>"O-"]
      ];

      foreach ($bloodtypes as $key => $bloodtype) {
          DB::table('blood_types')->insert([
              'name'=>$bloodtype['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

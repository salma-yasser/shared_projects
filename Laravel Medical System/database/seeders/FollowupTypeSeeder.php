<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $followup_types=[
          ['name'=>"تاريخ الانضمام"],
          ['name'=>"شهادة"],
          ['name'=>"تمديد فترة التجربة"],
          ['name'=>"تجديد عقد"],
          ['name'=>"تمديد عقد"],
          ['name'=>"اجراء جزاء"],
          ['name'=>"سلفة"],
          ['name'=>"استقالة"]
      ];

      foreach ($followup_types as $key => $followup_type) {
          DB::table('followup_types')->insert([
              'name'=>$followup_type['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

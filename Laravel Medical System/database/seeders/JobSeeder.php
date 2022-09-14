<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $jobs=[
          ['name'=>"مدير إداري"],
          ['name'=>"مدير طبي"],
          ['name'=>"HR"],
          ['name'=>"موظفة إستقبال"],
          ['name'=>"أخصائي علاج طبيعي"],
          ['name'=>"أخصائي أول علاج طبيعي"],
          ['name'=>"أخصائي أول الطب التقويمي والعلاج الطبيعي"],
          ['name'=>"عامل نظافة"]
      ];

      foreach ($jobs as $key => $job) {
          DB::table('jobs')->insert([
              'name'=>$job['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

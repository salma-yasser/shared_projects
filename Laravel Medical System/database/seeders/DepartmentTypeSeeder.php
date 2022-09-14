<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $department_types=[
          ['name'=>"الادارة العامة"],
          ['name'=>"الطبي"],
          ['name'=>"الاداري"],
          ['name'=>"الخدمات"]
      ];

      foreach ($department_types as $key => $department_type) {
          DB::table('department_types')->insert([
              'name'=>$department_type['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

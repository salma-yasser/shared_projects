<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $medical_departments=[
          ['name'=>"الأطفال"],
          ['name'=>"علاج وظيفي"],
          ['name'=>"نطق وتخاطب"],
          ['name'=>"كبار - رجال"],
          ['name'=>"كبار - نساء"]
      ];

      $service_departments=[
          ['name'=>"HR"],
          ['name'=>"الاستقبال"],
          ['name'=>"الحسابات"]
      ];

      foreach ($medical_departments as $key => $department) {
          DB::table('departments')->insert([
              'name'=>$department['name'],
              'department_type_id' => 2,
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }

      foreach ($service_departments as $key => $department) {
          DB::table('departments')->insert([
              'name'=>$department['name'],
              'department_type_id' => 1,
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

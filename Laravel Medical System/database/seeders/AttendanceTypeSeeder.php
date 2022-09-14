<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $attendancetypes=[
          ['name'=>"حاضر", 'color'=>"bg-success"],
          ['name'=>"غائب", 'color'=>"bg-danger"],
          ['name'=>"إذن", 'color'=>"bg-warning"],
          ['name'=>"أجازة رسمية", 'color'=>"bg-primary"]
      ];

      foreach ($attendancetypes as $key => $attendancetype) {
          DB::table('attendance_types')->insert([
              'name'=>$attendancetype['name'],
              'color'=>$attendancetype['color'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

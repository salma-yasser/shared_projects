<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpWorkingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emp_working_time')->insert([
            'employee_id'=>'1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

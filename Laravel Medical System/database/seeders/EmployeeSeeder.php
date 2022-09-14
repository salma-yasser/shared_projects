<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name'=>'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('P@ssword5'),
            'emp_no' => 'admin',
            'authority_id' => 1,
            'fullname' => 'Admin',
            'nationality_id' => 2,
            'department_id' => 1,
            'job_id' => 1,
            'contract_type_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

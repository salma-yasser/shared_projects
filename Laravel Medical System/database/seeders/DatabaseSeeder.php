<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AuthoritySeeder;
use Database\Seeders\BloodTypeSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\NationalitySeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\DepartmentTypeSeeder;
use Database\Seeders\ContractTypeSeeder;
use Database\Seeders\FollowupTypeSeeder;
use Database\Seeders\AttendanceTypeSeeder;
use Database\Seeders\EmpWorkingTimeSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
          AuthoritySeeder::class,
          BloodTypeSeeder::class,
          ContractTypeSeeder::class,
          DepartmentTypeSeeder::class,
          DepartmentSeeder::class,
          JobSeeder::class,
          NationalitySeeder::class,
          EmployeeSeeder::class,
          FollowupTypeSeeder::class,
          AttendanceTypeSeeder::class,
          EmpWorkingTimeSeeder::class,
    ]);
    }
}

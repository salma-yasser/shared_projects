<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $authorities=[
          ['name'=>"Super Admin"],
          ['name'=>"Admin"],
          ['name'=>"المدير الأداري"],
          ['name'=>"المدير الطبي"],
          ['name'=>"HR"],
          ['name'=>"طبيب"],
          ['name'=>"موظف استقبال"]
      ];

      foreach ($authorities as $key => $authority) {
          DB::table('authorities')->insert([
              'name'=>$authority['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

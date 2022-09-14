<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $contract_types=[
          ['name'=>"عقد كامل محدد المده"],
          ['name'=>"عقد غير محدد المده"],
          ['name'=>"عقد عمل جزئي"]
      ];

      foreach ($contract_types as $key => $contract_type) {
          DB::table('contract_types')->insert([
              'name'=>$contract_type['name'],
              'created_at' => now(),
              'updated_at' => now(),
          ]);
      }
    }
}

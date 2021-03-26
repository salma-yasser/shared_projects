<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parents', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('');
            $table->string('relative')->default('');
            $table->string('mobile1')->default('');
            $table->string('mobile2')->default('');
            $table->string('phone')->default('');
            $table->string('address')->default('');
            $table->string('email')->default('');
            $table->string('work')->default('');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parents');
	}

}

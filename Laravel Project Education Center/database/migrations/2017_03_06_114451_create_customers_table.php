<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default("");
            $table->string('nationality')->default("egyptian");
            $table->string('national_id')->default("");
            $table->date('birthdate');
            $table->integer('gender')->default(0);
            $table->integer('type')->default(0);
            $table->string('how_know')->default("");
            $table->string('status')->default("");
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
		Schema::drop('customers');
	}

}

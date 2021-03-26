<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adults', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id');
            $table->string('address')->default('');
            $table->string('city')->default('');
            $table->string('mobile1')->default('');
            $table->string('mobile2')->default('');
            $table->string('phone')->default('');
            $table->string('qualification')->default('');
            $table->string('email')->default('');
            $table->integer('job_status')->default(0);
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
		Schema::drop('adults');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureCustomerProgramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lecture_customer_programs', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('customer_program_id')->unsigned();
            $table->foreign('customer_program_id')->references('id')->on('customer_programs')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('attendence')->default(0);
            $table->integer('assignment')->default(0);
            $table->integer('behavior')->default(0);
            $table->integer('active')->default(0);
            $table->integer('fees')->default(0);
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
		Schema::drop('lecture_customer_programs');
	}

}

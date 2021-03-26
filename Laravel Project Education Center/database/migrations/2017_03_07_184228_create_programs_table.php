<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programs', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id');
            $table->date('from_date')->default(date("Y-m-d"));
            $table->date('to_date')->default(date("Y-m-d"));
            $table->string('duration')->default("");
            $table->integer('price')->default(0);
            $table->integer('priority')->default(0);
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
		Schema::drop('programs');
	}

}

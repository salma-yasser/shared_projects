<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('department_id');
            $table->string('name')->default('');
            $table->string('description')->default('');
            $table->string('goals')->default('');
            $table->string('age')->default('');
            $table->string('duration')->default('');
            $table->string('levels')->default('');
            $table->string('tutorials')->default('');
            $table->string('how_performance')->default('');
            $table->string('how_register')->default('');
            $table->string('how_degree')->default('');
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
		Schema::drop('courses');
	}

}

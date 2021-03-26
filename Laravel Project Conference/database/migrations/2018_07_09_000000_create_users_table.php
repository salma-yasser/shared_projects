<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->integer('degree_id')->unsigned();
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->string('affiliation');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('is_egyptian');
            $table->string('registration_fee');
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
        Schema::dropIfExists('users');
    }
}

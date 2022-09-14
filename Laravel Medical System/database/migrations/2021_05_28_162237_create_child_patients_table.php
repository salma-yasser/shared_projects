<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->string('fullname');
            $table->set('kind',['أنثى','ذكر'])->default('ذكر');
            $table->date('birthdate');
            $table->foreignId('nationality_id');
            $table->string('address')->nullable();
            $table->string('sa_id')->nullable();
            $table->string('fullname_parent');
            $table->string('work_parent')->nullable();
            $table->string('mobile_1');
            $table->string('mobile_2')->nullable();
            $table->string('sa_id_parent');
            $table->string('relation_parent')->nullable();
            $table->date('entry_date')->nullable();
            $table->boolean('previous_session')->default(false);
            $table->string('previous_session_place')->nullable();
            $table->string('previous_session_number')->nullable();
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('child_patients');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_patient_id');
            $table->foreignId('employee_id');
            $table->foreignId('department_package_id');
            $table->foreignId('child_package_id')->nullable();
            $table->string('name');
            $table->timestamp('time')->nullable();
            $table->double('cost');
            $table->double('discount')->default(0);
            $table->double('paid');
            $table->double('rest');
            $table->set('paid_type',['0', '1']);
            $table->integer('status')->default(0);
            $table->string('medical_execuse_file')->nullable();
            $table->foreignId('child_appointment_id')->nullable();
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
        Schema::dropIfExists('child_appointments');
    }
}

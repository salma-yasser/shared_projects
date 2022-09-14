<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildChangeAppointmentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_change_appointment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_appointment_id')->unique()->onDelete('cascade');
            $table->foreignId('child_patient_id');
            $table->set('status',[0, 1])->nullable();
            $table->timestamp('time')->nullable();
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
        Schema::dropIfExists('child_change_appointment_requests');
    }
}

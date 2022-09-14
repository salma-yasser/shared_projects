<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildPatientOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_patient_outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_patient_id')->nullable();
            $table->foreignId('child_package_id')->nullable();
            $table->foreignId('credit_invoice_id')->nullable();
            $table->string('description');
            $table->double('paid');
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
        Schema::dropIfExists('child_patient_outcomes');
    }
}

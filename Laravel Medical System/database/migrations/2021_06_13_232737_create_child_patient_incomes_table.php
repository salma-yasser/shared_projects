<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildPatientIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_patient_incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_patient_id');
            $table->foreignId('department_package_id');
            $table->foreignId('child_package_id')->nullable();
            $table->foreignId('invoice_id')->nullable();
            $table->set('paid_type',['0', '1']);
            $table->double('paid');
            $table->set('is_received',['0', '1'])->default('0');
            $table->dateTime('receiving_date')->nullable();
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
        Schema::dropIfExists('child_patient_incomes');
    }
}

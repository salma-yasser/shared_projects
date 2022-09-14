<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_patient_id');
            $table->foreignId('employee_id');
            $table->foreignId('department_package_id');
            $table->double('cost');
            $table->double('discount')->default(0);
            $table->date('supscription_date');
            $table->date('expire_date');
            $table->double('paid');
            $table->double('rest');
            $table->set('paid_type',['0', '1']);
            $table->integer('rest_session_number');
            $table->integer('status')->default(0);
            $table->date('pending_time')->nullable();
            $table->string('pending_reason')->nullable();
            $table->string('pending_file')->nullable();
            $table->double('refund')->nullable();
            $table->set('is_refunded',['0', '1'])->default(0);
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
        Schema::dropIfExists('child_packages');
    }
}

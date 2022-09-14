<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->foreignId('child_patient_id');
            $table->set('note_type',['0', '1']);
            $table->text('note_description');
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
        Schema::dropIfExists('child_notes');
    }
}

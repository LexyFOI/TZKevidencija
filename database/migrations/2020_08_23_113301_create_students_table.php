<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('oib');
            $table->string('student_name');
            $table->string('student_last_name');
            $table->string('email');
            //$table->integer('year');
            $table->integer('course_id');
            //$table->integer('excuse_id');
            //$table->integer('group_id');
            //$table->integer('no_excused_weekends');
            //$table->integer('no_worked_hours');
            //$table->string('comment');
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
        Schema::dropIfExists('students');
    }
}

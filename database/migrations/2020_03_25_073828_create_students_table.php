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
            $table->bigIncrements('id');
            $table->string("photo");
            $table->string("name");
            $table->string("lname");
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->foreign("parent_id")->references('id')->on('parents')->onDelete('SET NULL');
            $table->string("mother");
            $table->string("gender");
            $table->date("date_of_birth");
            $table->string("nationality");
            $table->string("mother_tongue");
            $table->string("place_of_birth");
            $table->string("aadhaar");
            $table->string("previous_school");
            $table->string("previous_exam");
            $table->string("exam_percentage");
            $table->string("resident_address")->nullable();
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

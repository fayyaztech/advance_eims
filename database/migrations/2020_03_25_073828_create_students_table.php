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
            $table->integer("parent_id");
            $table->string("mother");
            $table->string("aadhaar");
            $table->date("date_of_birth");
            $table->string("gender");
            $table->string("place_of_birth");
            $table->string("nationality");
            $table->string("mother_tongue");
            $table->string("previous_school");
            $table->string("address_of_school");
            $table->string("previous_exam");
            $table->string("exam_percentage");
            $table->string("reason_of_leaving");
            $table->string("resident_address");
            $table->string("alternative_address");
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

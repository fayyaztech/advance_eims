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
            $table->string("photo")->nullable();
            $table->string("first_name");
            $table->string("last_name")->nullable();
            $table->string("gr_no");
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->foreign("parent_id")->references('id')->on('parents')->onDelete('SET NULL');
            $table->string("mother");
            $table->string("gender");
            $table->date("date_of_birth");
            $table->date("date_of_admission")->nullable();
            $table->string("nationality");
            $table->string("mother_tongue");
            $table->string("place_of_birth")->nullable();
            $table->string("aadhaar");
            $table->string("last_attended_school");
            $table->string("last_attended_class");
            $table->string("last_attended_exam");
            $table->string("exam_percentage");
            $table->date("date_of_leaving")->nullable();
            $table->string("reason_of_leaving")->nullable();
            $table->string("resident_address")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("account_no")->nullable();
            $table->string("ifsc")->nullable();
            $table->integer("tc_printed")->default(0);
            $table->integer("is_active")->default(1);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubjectGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("class_student_id");
            $table->foreign("class_student_id")->references("id")->on("class_students")->onDelete("cascade");
            $table->unsignedBigInteger("subject_group_id");
            $table->unsignedBigInteger("subject_id");
            $table->foreign("subject_group_id")->references("id")->on("subject_group_names")->onDelete("cascade");
            $table->foreign("subject_id")->references("id")->on("row_subjects")->onDelete("cascade");
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
        Schema::dropIfExists('student_subject_groups');
    }
}

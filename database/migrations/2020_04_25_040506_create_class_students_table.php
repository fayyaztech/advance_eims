<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
            $table->foreign("student_id")->references("id")->on("students")->onDelete("cascade");
            $table->integer("roll_no")->nullable();
            $table->boolean("is_active")->default(1);
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
        Schema::dropIfExists('class_students');
    }
}

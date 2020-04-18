<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("class_id");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
            $table->unsignedBigInteger("teacher_id")->nullable();
            $table->foreign("teacher_id")->references("id")->on("teachers")->onDelete("set null");
            $table->date("Joining_date");
            $table->date("leaving_date")->nullable();
            $table->integer("is_active");
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
        Schema::dropIfExists('class_teachers');
    }
}

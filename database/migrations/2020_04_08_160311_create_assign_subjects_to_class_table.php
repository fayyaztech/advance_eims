<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectsToClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subjects_to_class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("class_id");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
            $table->unsignedBigInteger("subject_id");
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
        Schema::dropIfExists('assign_subjects_to_class');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignGroupSubjectsToClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_group_subjects_to_class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("class_id");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
            $table->unsignedBigInteger("subject_group_id");
            $table->foreign("subject_group_id")->references("id")->on("subject_group_names")->onDelete('cascade');
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
        Schema::dropIfExists('assign_group_subjects_to_class');
    }
}

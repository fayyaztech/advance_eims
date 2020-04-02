<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectGroupSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_group_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("subject_group_id");
            $table->foreign("subject_group_id")->references("id")->on("subject_group_names")->onDelete('cascade');
            $table->unsignedBigInteger("row_subject_id");
            $table->foreign("row_subject_id")->references("id")->on("row_subjects")->onDelete('cascade');
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
        Schema::dropIfExists('subject_group_subjects');
    }
}

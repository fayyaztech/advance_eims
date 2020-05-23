<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("start_date");
            $table->foreign("start_date")->references("id")->on("calendars")->onDelete("cascade");
            $table->date("end_date")->nullable();
            $table->unsignedBigInteger("event_type_id");
            $table->foreign("event_type_id")->references("id")->on("event_types")->onDelete("cascade");
            $table->string("title");
            $table->time("start_time")->nullable();
            $table->time("end_time")->nullable();
            $table->string("url")->nullable();
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
        Schema::dropIfExists('calendar_events');
    }
}

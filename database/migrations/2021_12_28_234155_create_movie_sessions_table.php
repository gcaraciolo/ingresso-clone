<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_sessions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('room_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('movie_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedSmallInteger('seats_available');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_sessions');
    }
}

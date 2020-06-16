<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('season_id');
            $table->string('file_id', 100);
            $table->integer('episode_number');
            $table->string('episode_caption', 191)->nullable();
            $table->bigInteger('next_episode')->nullable();
            $table->bigInteger('previous_episode')->nullable();
            $table->bigInteger('starting_opening')->nullable();
            $table->bigInteger('starting_intro')->nullable();
            $table->bigInteger('starting_ending')->nullable();
            $table->bigInteger('starting_addition')->nullable();
            $table->bigInteger('duration_opening')->nullable();
            $table->bigInteger('duration_intro')->nullable();
            $table->bigInteger('duration_ending')->nullable();
            $table->bigInteger('duration_addition')->nullable();
            $table->timestamps();
        });
        DB::update("ALTER TABLE videos AUTO_INCREMENT = 10;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}

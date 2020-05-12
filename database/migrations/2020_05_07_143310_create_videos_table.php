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
            $table->bigInteger('season_id')->default(12);
            $table->string('file_id', 100)->default('text');
            $table->integer('episode_number')->default(12);
            $table->string('episode_caption', 191)->nullable()->default('text');
            $table->bigInteger('next_episode')->nullable()->default(12);
            $table->bigInteger('previous_episode')->nullable()->default(12);
            $table->bigInteger('starting_openning')->nullable()->default(12);
            $table->bigInteger('starting_intro')->nullable()->default(12);
            $table->bigInteger('starting_ending')->nullable()->default(12);
            $table->bigInteger('starting_addition')->nullable()->default(12);
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

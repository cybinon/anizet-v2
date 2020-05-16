<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('anime_id');
            $table->bigInteger('number');
            $table->string('name', 100)->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('status')->nullable();
            $table->integer('episodes')->nullable();
            $table->string('trailer', 255)->nullable();
            $table->string('image_width', 255)->nullable();
            $table->string('image_height', 255)->nullable();
            $table->timestamps();
        });
        DB::update("ALTER TABLE seasons AUTO_INCREMENT = 10;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}

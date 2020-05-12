<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(12);
            $table->mediumText('caption_en')->nullable()->default('text');
            $table->mediumText('caption_mn')->nullable()->default('text');
            $table->mediumText('caption_kanji')->nullable()->default('text');
            $table->string('rating', 100)->nullable()->default('text');
            $table->string('category',255)->nullable()->default('text');
            $table->timestamps();
        });
        DB::update("ALTER TABLE animes AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');

            $table->string('title', 100);
            $table->string('description', 191)->nullable();

            $table->boolean('payrequire')->nullable()->default(false);
            $table->boolean('confirmed')->nullable()->default(false);

            $table->longtext('content')->nullable();
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
        Schema::dropIfExists('novels');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('twitter_card', 1023);
            $table->string('twitter_site', 1023);
            $table->string('twitter_creator', 1023);
            $table->string('twitter_title', 1023);
            $table->text('twitter_description');
            $table->string('twitter_image', 2047)->nullable();
            $table->string('twitter_stream', 2047)->nullable();
            $table->string('twitter_player_stream', 2047)->nullable();
            $table->string('youtube_url', 2047);
            $table->string('youtube_code', 2047);
            $table->string('slug', 1023);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('card');
    }
}

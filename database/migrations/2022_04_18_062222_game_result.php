<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_result', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('weekUuid');
            $table->uuid('playerAUuid');
            $table->uuid('playerBUuid');
            $table->integer('playerAGoals');
            $table->integer('playerBGoals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game_result');
    }
};

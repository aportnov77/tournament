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
        Schema::create('week', function (Blueprint $table) {
            $table->uuid();
            $table->uuid('tournamentUuid');
            $table->integer('weekNumber');
            $table->primary('uuid');
        });

        Schema::create('game', function (Blueprint $table) {
            $table->uuid();
            $table->uuid('weekUuid');
            $table->uuid('playerAUuid');
            $table->uuid('playerBUuid');
            $table->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game');
        Schema::drop('week');
    }
};

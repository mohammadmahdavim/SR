<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_group_segments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_group_season_id');
            $table->foreign('game_group_season_id')->references('id')->on('game_group_seasons')->onDelete('cascade');
            $table->string('stage')->comment('Group,Playoff/knockout,League')->nullable();
            $table->string('name');
            $table->integer('sort_index')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('ip_created_by');
            $table->unsignedBigInteger('last_edit_by')->nullable();
            $table->foreign('last_edit_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('ip_last_edit_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('game_group_segments');
    }
};

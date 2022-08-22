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
        Schema::create('game_group_seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_group_id');
            $table->foreign('game_group_id')->references('id')->on('game_groups')->onDelete('cascade');
            $table->integer('from_year')->nullable();
            $table->integer('to_year')->nullable();
            $table->integer('from_time')->nullable();
            $table->integer('to_time')->nullable();
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
        Schema::dropIfExists('game_group_seasons');
    }
};

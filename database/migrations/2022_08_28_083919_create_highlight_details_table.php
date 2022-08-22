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
        Schema::create('highlight_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('highlight_id');
            $table->foreign('highlight_id')->references('id')->on('highlights')->onDelete('cascade');
            $table->unsignedBigInteger('team_profile_id');
            $table->foreign('team_profile_id')->references('id')->on('team_profiles')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('event_player_id');
            $table->foreign('event_player_id')->references('id')->on('event_players')->onDelete('cascade');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
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
        Schema::dropIfExists('highlight_details');
    }
};

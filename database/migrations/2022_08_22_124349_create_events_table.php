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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_type_id');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');
            $table->unsignedBigInteger('game_group_segment_id');
            $table->foreign('game_group_segment_id')->references('id')->on('game_group_segments')->onDelete('cascade');
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->unsignedBigInteger('home_team_profile_id');
            $table->foreign('home_team_profile_id')->references('id')->on('team_profiles')->onDelete('cascade');
            $table->unsignedBigInteger('away_team_profile_id');
            $table->foreign('away_team_profile_id')->references('id')->on('team_profiles')->onDelete('cascade');
            $table->unsignedBigInteger('game_location_id');
            $table->foreign('game_location_id')->references('id')->on('game_locations')->onDelete('cascade');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->date('date');
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
        Schema::dropIfExists('events');
    }
};

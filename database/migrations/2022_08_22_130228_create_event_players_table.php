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
        Schema::create('event_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('team_profile_member_id');
            $table->foreign('team_profile_member_id')->references('id')->on('team_profile_members')->onDelete('cascade');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->integer('number')->nullable();
            $table->unsignedBigInteger('polar_sensor_id')->nullable();
            $table->foreign('polar_sensor_id')->references('id')->on('contract_product_details')->onDelete('cascade');
            $table->unsignedBigInteger('footbar_sensor_id')->nullable();
            $table->foreign('footbar_sensor_id')->references('id')->on('contract_product_details')->onDelete('cascade');
            $table->string('player_status')->comment('recovery,available,international_duty,injured')->default('available');
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
        Schema::dropIfExists('event_players');
    }
};

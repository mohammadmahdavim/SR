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
        Schema::create('sport_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->unsignedBigInteger('base_section_id');
            $table->foreign('base_section_id')->references('id')->on('base_sections')->onDelete('cascade');
            $table->boolean('is_football_game_stage')->default(0);
            $table->boolean('is_training')->default(0);
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
        Schema::dropIfExists('sport_sections');
    }
};

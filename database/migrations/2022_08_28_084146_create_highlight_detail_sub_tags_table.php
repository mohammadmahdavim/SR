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
        Schema::create('highlight_detail_sub_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('highlight_detail_id');
            $table->foreign('highlight_detail_id')->references('id')->on('highlight_details')->onDelete('cascade');
            $table->unsignedBigInteger('sub_tag_id');
            $table->foreign('sub_tag_id')->references('id')->on('sub_tags')->onDelete('cascade');
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
        Schema::dropIfExists('highlight_detail_sub_tags');
    }
};

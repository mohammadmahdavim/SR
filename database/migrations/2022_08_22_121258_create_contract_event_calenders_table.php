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
        Schema::create('contract_event_calenders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_profile_id');
            $table->foreign('team_profile_id')->references('id')->on('team_profiles')->onDelete('cascade');
            $table->unsignedBigInteger('contract_product_detail_id');
            $table->foreign('contract_product_detail_id')->references('id')->on('contract_product_details')->onDelete('cascade');
            $table->unsignedBigInteger('contract_service_detail_id');
            $table->foreign('contract_service_detail_id')->references('id')->on('contract_service_details')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->time('from_time')->nullable();
            $table->time('to_time')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('contract_event_calenders');
    }
};

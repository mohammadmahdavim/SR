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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('english_name');
            $table->string('second_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('image_url')->nullable();
            $table->text('contact_numbers')->nullable();
            $table->text('addresses')->nullable();
            $table->text('contact_emails')->nullable();
            $table->unsignedBigInteger('regionId');
            $table->foreign('regionId')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->unsignedBigInteger('organization_type_id');
            $table->foreign('organization_type_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('Parent_organization_id')->nullable();
            $table->foreign('Parent_organization_id')->references('id')->on('organizations')->onDelete('cascade');
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
        Schema::dropIfExists('organizations');
    }
};

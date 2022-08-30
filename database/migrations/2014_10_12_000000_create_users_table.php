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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('english_first_name')->nullable();
            $table->string('english_last_name')->nullable();
            $table->string('second_first_name')->nullable();
            $table->string('second_last_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->string('temp_position')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_name');
            $table->enum('preferred_foot',['right','left','both'])->nullable();
            $table->decimal('weight')->nullable();
            $table->date('birth_date')->nullable();
            $table->unsignedBigInteger('countryId')->nullable();
            $table->foreign('countryId')->references('id')->on('regions')->onDelete('cascade');
            $table->string('password');
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('ip_created_by');
            $table->unsignedBigInteger('last_edit_by')->nullable();
            $table->foreign('last_edit_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('ip_last_edit_by')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->string('serialNumber')->nullable();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('buy_price_type')->nullable();
            $table->foreign('buy_price_type')->on('buy_price_types')->references('id')->onDelete('cascade');
            $table->string('buy_price')->nullable();
            $table->string('buy_price_rial')->nullable();
            $table->string('model')->nullable();
            $table->string('activation_status');
            $table->string('rent_status');
            $table->integer('hour_used')->nullable();
            $table->integer('year')->nullable();
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
        Schema::dropIfExists('inventory_products');
    }
};

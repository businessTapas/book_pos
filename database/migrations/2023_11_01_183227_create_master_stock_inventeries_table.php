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
        Schema::create('master_stock_inventeries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('store_id')->references('id')->on('stores');
            $table->foreignId('storage_site_id')->references('id')->on('storage_sites');
            $table->foreignId('storage_location_id')->references('id')->on('storage_locations');
            $table->foreignId('rack_id')->references('id')->on('racks');
            $table->integer('qty');
            $table->double('purchase_price');
            $table->double('sale_price');
            $table->double('supplier_price');
            $table->double('discount_amount')->nullable();
            $table->string('batch_no')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('master_stock_inventeries');
    }
};

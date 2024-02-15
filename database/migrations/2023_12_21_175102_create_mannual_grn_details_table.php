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
        Schema::create('mannual_grn_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mannual_grn_id')->references('id')->on('mannual_grns');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('storage_site_id')->references('id')->on('storage_sites');
            $table->foreignId('storage_location_id')->references('id')->on('storage_locations');
            $table->foreignId('rack_id')->references('id')->on('racks');
            $table->string('price')->nullable();
            $table->string('batch_no')->nullable();
            $table->integer('request_qty');
            $table->double('total_amount')->nullable();
            $table->timestamps();  // by this method create two columns created_at and updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mannual_grn_details');
    }
};

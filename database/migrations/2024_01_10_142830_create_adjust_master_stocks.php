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
        Schema::create('adjust_master_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_stock_inventeries_id')->references('id')->on('master_stock_inventeries');
            $table->integer('prev_qty')->nullable();
            $table->integer('adjust_qty')->nullable();
            $table->double('adjust_amount')->nullable();
            $table->double('prev_sale_price')->nullable();
            $table->double('adjust_sale_price')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // creating the relationship on three columns created_at , updated_at and deleted_at
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjust_master_stocks');
    }
};

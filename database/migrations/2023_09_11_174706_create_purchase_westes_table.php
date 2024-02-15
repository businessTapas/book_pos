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
        Schema::create('purchase_westes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->references('id')->on('purchases');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('mrp_price');
            $table->double('purchase_price');
            $table->double('sale_price');
            $table->string('batch_no');
            $table->integer('request_qty');
            $table->integer('dispatch_qty');
            $table->integer('received_qty');
            $table->double('cgst');
            $table->double('sgst');
            $table->double('igst');
            $table->double('tax_amount');
            $table->double('taxeble_amount');
      
            $table->double('total_amount');
            $table->text('description');
            $table->enum('waste_status',['completely','partial']);
            $table->timestamps();  // by this method create two columns created_at and updated_at
            $table->softDeletes();
            // creating the relationship on three columns created_at , updated_at and deleted_at
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->references('id')->on('users');
            $table->foreignId('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_westes');
    }
};

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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->comment('from_store')->references('id')->on('stores');
            $table->foreignId('to_store')->comment('to store')->references('id')->on('stores');
            $table->foreignId('supplier_id')->references('id')->on('users');

            $table->string('po_no');
            $table->string('dispatch_no');
            $table->date('dispatch_date');
            $table->date('expected_delivery_date')->nullable();
            $table->string('transport_details')->nullable();
            $table->double('transport_charge')->nullable();
            $table->double('cgst')->nullable();
            $table->double('sgst')->nullable();
            $table->double('igst')->nullable();
            $table->double('tax_amount')->nullable();
            $table->double('taxeble_amount')->nullable();
            $table->double('round_off_amount')->nullable();
            $table->double('total_amount')->nullable();
            $table->double('paid_amount')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();  // by this method create two columns created_at and updated_at
            $table->softDeletes();
            $table->foreignId('dispatch_by')->nullable()->references('id')->on('users');
            $table->foreignId('received_by')->nullable()->references('id')->on('users');

            // creating the relationship on three columns created_at , updated_at and deleted_at
            $table->foreignId('created_by')->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->foreignId('deleted_by')->nullable()->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
};

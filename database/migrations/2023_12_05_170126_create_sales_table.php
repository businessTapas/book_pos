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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('storage_site_id')->nullable()->references('id')->on('storage_sites');
            $table->foreignId('store_id')->references('id')->on('stores');
            $table->foreignId('sale_by')->references('id')->on('users');
            $table->string('pos_id')->nullable();
            $table->string('invoice_no');
            $table->string('type')->nullable()->comment('from where to creating the sale like from pos or mannual sale');
            $table->date('sale_date');
            $table->double('total_tax');
            $table->double('shipping_charges')->default(0);
            $table->string('discount_type')->nullable();
            $table->double('discount')->comment("it's may be percentage of the discount and may be flat according the that calculate the amoutn");
            $table->double('sub_total');
            $table->double('total');
            $table->string('status')->default('unpaid')->comment("it's for understading purpuse status wil come from the payment table ");
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('sales');
    }
};

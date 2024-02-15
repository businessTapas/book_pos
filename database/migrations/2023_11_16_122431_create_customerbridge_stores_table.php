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
        Schema::create('customerbridge_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->nullable()->references('id')->on('stores');
            $table->foreignId('customer_id')->nullable()->references('id')->on('customers');
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
        Schema::dropIfExists('customerbridge_stores');
    }
};

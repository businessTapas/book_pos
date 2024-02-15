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
        Schema::table('sale_payaments', function (Blueprint $table) {
            $table->foreignId('sale_id')->nullable()->references('id')->on('sales')->after('id');
            $table->string('ref_no')->nullable()->after('sale_id');
            $table->enum('status',['accept', 'reject','cancel'])->nullable()->default('accept')->after('ref_no');
            $table->string('bank_name')->nullable()->after('status');
            $table->string('card_no')->nullable()->after('bank_name');
            $table->string('upi_no')->nullable()->after('card_no');
            $table->double('amount')->after('upi_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_payaments', function (Blueprint $table) {
            //
        });
    }
};

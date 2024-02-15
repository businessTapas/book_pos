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
        Schema::table('master_stock_inventeries', function (Blueprint $table) {
            $table->unsignedBigInteger('transfer_from_id')->nullable()->change();
            $table->foreign('transfer_from_id')
            ->references('id')->on('storage_sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_stock_inventeries', function (Blueprint $table) {
            //
        });
    }
};

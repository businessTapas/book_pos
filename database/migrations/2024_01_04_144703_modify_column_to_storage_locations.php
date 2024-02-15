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
        Schema::table('storage_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('storage_site_id')->nullable()->change();
            $table->foreign('storage_site_id')->references('id')->on('storage_sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storage_locations', function (Blueprint $table) {
            //
        });
    }
};

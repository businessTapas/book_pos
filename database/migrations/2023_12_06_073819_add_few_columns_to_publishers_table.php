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
        Schema::table('publishers', function (Blueprint $table) {
            $table->string('state_id')->nullable()->after('id');
            $table->string('pin_code')->nullable()->after('address');
            $table->string('bank_name')->nullable()->after('status');
            $table->string('acc_holder_name')->nullable()->after('bank_name');
            $table->string('acc_no')->nullable()->after('acc_holder_name');
            $table->string('ifsc_code')->nullable()->after('acc_no');
            $table->string('gst_no')->nullable()->after('ifsc_code');
            $table->string('logo_image')->nullable()->after('gst_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publishers', function (Blueprint $table) {
            //
        });
    }
};

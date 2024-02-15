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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('ifsc_code');
            $table->string('account_no');
            $table->string('account_holder_namne');
            $table->string('branch');
            $table->string('branch_address');
            $table->text('description');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('banks');
    }
};

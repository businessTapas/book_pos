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
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories');
 
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands');
            $table->foreignId('supplier_id')->references('id')->on('users');
            $table->foreignId('gst_slab_id')->references('id')->on('gst_slabs');
            $table->string('title');
            $table->string('author');
            $table->string('isbn');
            $table->string('price');
            $table->string('publication_date');
            $table->string('language');
            $table->string('weight');
            $table->string('dimensions');
            $table->string('image');
            $table->string('pages');
            $table->text('description')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();  // by this method create two columns created_at and updated_at
            $table->softDeletes();
            // creating the relationship on three columns created_at , updated_at and deleted_at
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_requests');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->nullable();
            $table->string('slung');
            $table->string('replaced')->nullable()->default('0');
            $table->integer('product_id')->nullable();
            $table->integer('price_raw')->nullable();
            $table->tinyInteger('offer')->default(0);
            $table->tinyInteger('special')->default(0);
            $table->string('stock')->default('In Stock');
            $table->string('meta')->nullable();
            $table->string('price', 191)->nullable();
            $table->integer('shipping')->default(500);
            $table->string('cat', 191)->nullable();
            $table->integer('tag')->nullable();
            $table->string('sub_cat', 191)->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('trending')->default(0);
            $table->tinyInteger('suggest')->default(0);
            $table->tinyInteger('favorite')->nullable()->default(0);
            $table->tinyInteger('combo')->default(0);
            $table->tinyInteger('banner')->default(0);
            $table->tinyInteger('slider')->default(0);
            $table->string('code', 191)->nullable();
            $table->string('brand')->nullable();
            $table->string('full', 11)->default('0');
            $table->text('iframe')->nullable();
            $table->text('content')->nullable();
            $table->string('fb_pixels')->nullable()->default('product-1-big.jpg');
            $table->integer('google_product_category')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('image_one', 191)->nullable();
            $table->string('offer_banner')->nullable();
            $table->string('image_two', 191)->nullable();
            $table->string('image_three', 191)->nullable();
            $table->string('image_four', 191)->nullable();
            $table->text('extras')->nullable();
            $table->string('box')->nullable();
            $table->string('warranty')->nullable();
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
        Schema::dropIfExists('variations');
    }
}

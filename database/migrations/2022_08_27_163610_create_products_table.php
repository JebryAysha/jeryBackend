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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('code');
            $table->string('type');
            $table->string('barcode_symbology');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('purchase_unit_id');
            $table->unsignedBigInteger('sale_unit_id');
            $table->double('cost');
            $table->double('marge_detail');
            $table->double('marge_gros');
            $table->double('remise_detail');
            $table->double('prix_min_detail');
            $table->double('remise_gros');
            $table->double('prix_min_gros');
            $table->string('price');
            $table->double('qty');
            $table->double('alert_quantity');
            $table->tinyInteger('promotion');
            $table->string('promotion_price');
            $table->string('starting_date');
            $table->date('last_date');
            $table->unsignedBigInteger('tax_id');
            $table->unsignedBigInteger('tax_method');
            $table->text('image');
            $table->string('file');
            $table->tinyInteger('is_variant');
            $table->tinyInteger('featured');
            $table->string('product_list');
            $table->string('qty_list');
            $table->string('price_list');
            $table->text('product_details');
            $table->tinyInteger('is_active');
            $table->tinyInteger('is_stockable');
            $table->double('prixgros');
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
        Schema::dropIfExists('products');
    }
};

<?php

use App\Models\Categorie;
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
            $table->string('name')->nullable();

            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('barcode_symbology')->nullable();
            $table->foreignIdFor(Categorie::class);
            $table->double('cost')->nullable();
            $table->double('marge_detail')->nullable();
            $table->double('marge_gros')->nullable();
            $table->double('remise_detail')->nullable();
            $table->double('prix_min_detail')->nullable();
            $table->double('remise_gros')->nullable();
            $table->double('prix_min_gros')->nullable();
            $table->string('price')->nullable();
            $table->double('qty')->nullable();
            $table->double('alert_quantity')->nullable();
            $table->tinyInteger('promotion')->nullable();
            $table->string('promotion_price')->nullable();
            $table->date('starting_date')->nullable();
            $table->date('last_date')->nullable();
            $table->text('image')->nullable();
            $table->string('file')->nullable();
            $table->tinyInteger('is_variant')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->string('product_list')->nullable();
            $table->string('qty_list')->nullable();
            $table->string('price_list')->nullable();
            $table->text('product_details')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->tinyInteger('is_stockable')->nullable();
            $table->double('prixgros')->nullable();
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

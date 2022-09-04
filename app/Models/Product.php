<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
         'name', 'code','type','barcode_symbology' ,'brand_id' ,'category_id','unit_id',
        'purchase_unit_id','sale_unit_id' ,'cost', 'marge_detail', 'marge_gros' ,
        'remise_detail', 'prix_min_detail' ,'remise_gros', 'prix_min_gros' ,
        'price','qty','alert_quantity','promotion','promotion_price', 'starting_date',
        'last_date' ,'tax_id', 'tax_method','image','file','is_variant', 'featured', 'product_list',
        'qty_list', 'price_list','product_details','is_active', 'is_stockable','prixgros'
    ];

//    public function categorie() {
//       return $this->belongsTo(Categorie::class, 'category_id');
//   }

}

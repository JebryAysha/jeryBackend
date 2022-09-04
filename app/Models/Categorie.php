<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        //'slug',
        'image',
        'parent_id',
        'is_active'
    ];
    public function product() {
        return $this->hasMany(Product::class);
    }
}

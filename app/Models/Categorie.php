<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    public function categorie()
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable = [
        'name',
        //'slug',
        'image',
        //'parent_id',
        'is_active'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $guarded = [];


    public function categories()
    {
        return $this->belongsTo(Categories::class, 'id_categories', 'id_categories');
    }

    public function variants()
    {
        return $this->belongsTo(Variants::class, 'id_variants', 'id_variants');
    }
    public function productimages()
    {
        return $this->belongsTo(ProductImages::class, 'id_product', 'id_product');
    }

}

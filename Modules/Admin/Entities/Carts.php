<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory;

     protected $table = 'cart';
     protected $fillable = [      
        'user_id',
        'product_id',
        'variation_id',
        'quantity',
        'variation_price',
    ];
     public function product()
    {
        return $this->belongsTo(Products::class , 'product_id', 'id');    
    }

    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class , 'variation_id', 'id');    
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CartFactory::new();
    }
}

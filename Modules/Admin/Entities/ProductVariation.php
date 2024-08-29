<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory;

     protected $table = 'product_variation';
     protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'in_stock',
        'variation_price',
        'used_stock',
        'created_at',
        'updated_at',
    ];
      public function product()
    {
        return $this->belongsTo(Products::class , 'product_id', 'id');    
    }
     public function color()
    {
        return $this->belongsTo(Colors::class , 'color_id', 'id');    
    }
    public function size()
    {
        return $this->belongsTo(Sizes::class , 'size_id', 'id');    
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductVariationFactory::new();
    }
}

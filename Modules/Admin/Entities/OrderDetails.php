<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;

     protected $table = 'order_details';
     protected $fillable = [      
        'order_id',
        'variation_id',
        'product_id',
        'quantity',
        'variation_price',
         'created_at',
          'updated_at',
    ];
     public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }
     public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class , 'variation_id', 'id');    
    }
     public function product()
    {
        return $this->belongsTo(Products::class , 'product_id', 'id');    
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\OrderDetailsFactory::new();
    }
}

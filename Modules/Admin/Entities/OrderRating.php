<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderRating extends Model
{
    use HasFactory;
     protected $table = 'order_ratings';
     protected $fillable = [      
        'user_id',
        'order_id',
        'product_id',
        'variation_id',         
        'user_rating',
        'user_comment',       
        'transaction_id',


    ];
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
      public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class , 'variation_id', 'id');    
    }
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\OrderRatingFactory::new();
    }
}

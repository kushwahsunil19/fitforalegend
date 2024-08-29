<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

     protected $table = 'wishlist';
      protected $fillable = [
        'user_id',
        'product_id',        
    ];
    public function product()
    {
        return $this->belongsTo(Products::class , 'product_id', 'id');    
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id', 'id');    
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\WishlistFactory::new();
    }
}

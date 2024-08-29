<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSize extends Model
{
    use HasFactory;

    
      protected $table = 'product_size';
      protected $fillable = [
        'product_id',
        'size_id',
        'price',
        'created_at',
        'updated_at',
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductSizeFactory::new();
    }
}

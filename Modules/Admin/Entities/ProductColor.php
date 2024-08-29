<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;

      protected $table = 'product_colors';
      protected $fillable = [
        'product_id',
        'color_id',       
        'created_at',
        'updated_at',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductColorFactory::new();
    }
}

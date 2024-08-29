<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;

      protected $table = 'product_images';
      protected $fillable = [
        'product_id',
        'images',
        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductImagesFactory::new();
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory;

    protected $table = 'brands';
     protected $fillable = [      
        'brand_name',   
        'slug',    
        'image',
        'status'
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\BrandsFactory::new();
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSpecification extends Model
{
    use HasFactory;

     protected $table = 'product_specification';
     protected $fillable = [
        'product_id',
        'specification_name',
        'specification_description',
        'created_at',
        'updated_at',
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductSpecificationFactory::new();
    }
}

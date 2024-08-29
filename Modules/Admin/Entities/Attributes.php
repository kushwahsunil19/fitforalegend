<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attributes extends Model
{
    use HasFactory;

   
      protected $table = 'attributes';
     protected $fillable = [      
        'attribute_name',   
        'attribute_value',        
        'status',
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\AttributesFactory::new();
    }
}

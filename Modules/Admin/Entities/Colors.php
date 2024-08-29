<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colors extends Model
{
    use HasFactory;

    protected $table = 'colors';
     protected $fillable = [      
        'color_name',   
        'color_code',        
        'status',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ColorsFactory::new();
    }
}

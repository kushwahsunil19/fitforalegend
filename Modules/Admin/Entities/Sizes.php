<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sizes extends Model
{
    use HasFactory;

   
     protected $table = 'sizes';
      protected $fillable = [       
        'size_name',
        'status'
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\SizesFactory::new();
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About_Us extends Model
{
    use HasFactory;

     protected $table = 'about_us';
    protected $fillable = [
        'title',
        'description',        
        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\AboutUsFactory::new();
    }
}

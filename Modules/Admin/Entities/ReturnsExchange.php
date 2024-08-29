<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReturnsExchange extends Model
{
    use HasFactory;

      protected $table = 'returns_exchanges';
    protected $fillable = [
        'title',
        'description',        
        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ReturnsExchangesFactory::new();
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

      protected $table = 'states';
      protected $fillable = [
        'country_id',
        'name',
        'code'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\StateFactory::new();
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apikey extends Model
{
    use HasFactory;

    protected $table = 'apikeys';
    protected $fillable = [
        'stripe_public_key',
        'stripe_secret_key',
        'google_map_key',
        'email',
        'password'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ApikeyFactory::new();
    }
}

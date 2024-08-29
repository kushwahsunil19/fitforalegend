<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model
{
    use HasFactory;

    protected $table = 'otp';
      protected $fillable = [
        'email',
        'phone',       
        'otp',        
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\OtpFactory::new();
    }
}

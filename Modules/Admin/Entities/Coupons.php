<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupons extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'discount',        
        'expiry_date',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CouponsFactory::new();
    }
}

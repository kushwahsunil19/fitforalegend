<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping_Delivery extends Model
{
    use HasFactory;

    protected $table = 'shipping_delivery';
    protected $fillable = [
        'title',
        'description',        
        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ShippingDeliveryFactory::new();
    }
}

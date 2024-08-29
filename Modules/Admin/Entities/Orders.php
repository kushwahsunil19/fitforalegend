<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;

     protected $table = 'orders';
     protected $fillable = [      
        'user_id',       
        'total_amount',
        'shipping_address',
        'country',
        'state',
        'zipcode',
        'address1',
        'address2',
        'payment_type',
        'cart_no',
        'month',
        'year',
        'cvv',
        'transaction_id',
        'refund_id',

    ];
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
      public function orderDetail()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\OrderFactory::new();
    }
}

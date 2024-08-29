<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCoupon extends Model
{
    use HasFactory;

     protected $table = 'user_coupons';
    protected $fillable = [
        'coupon_id',
        'user_id',        
      
    ];
       public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
      public function coupon()
    {
        return $this->belongsTo(Coupons::class, 'coupon_id', 'id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\UserCouponFactory::new();
    }
}

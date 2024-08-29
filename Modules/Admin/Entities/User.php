<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

      protected $table = 'users';
      protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'country_code',
        'gender',
        'image'
    ];
    public function order()
    {
       return $this->hasMany(Orders::class, 'user_id', 'id');
           
    }

     public function country()
    {
       return $this->belongsTo(Country::class, 'country_code', 'id');
           
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\UserFactory::new();
    }
}

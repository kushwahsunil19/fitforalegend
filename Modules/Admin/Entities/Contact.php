<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',        
        'phone',
        'subject',
        'message',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ContactFactory::new();
    }
}

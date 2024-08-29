<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermsCondition extends Model
{
    use HasFactory;

   protected $table = 'terms_conditions';
    protected $fillable = [
        'title',
        'description',        
        
    ];
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\TermsConditionsFactory::new();
    }
}

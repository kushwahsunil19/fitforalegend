<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategories extends Model
{
    use HasFactory;
     protected $table = 'subcategories';
     protected $fillable = [
        'category_id',
        'subcategory_name',   
        'description',    
        'image'
    ];
     public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\SubcategoriesFactory::new();
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterCategories extends Model
{
    use HasFactory;

    
    protected $table = 'master_categories';
      protected $fillable = [
        'master_category_name',
        'description',
        'image'
    ];
    
         public function category()
        {
             return $this->hasMany(Categories::class);
        }
        public function products()
        {
             return $this->hasMany(Products::class,'master_category_id','id');
        }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\MasterCategoriesFactory::new();
    }
}

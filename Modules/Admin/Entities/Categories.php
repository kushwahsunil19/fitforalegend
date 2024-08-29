<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
      protected $fillable = [
        'master_category_id',
        'category_name',
        'description',
        'image'
    ];
    public function sub_category()
    {
        return $this->hasMany(Subcategories::class);
    }
     public function masterCategory()
    {
        return $this->belongsTo(MasterCategories::class, 'master_category_id', 'id');
    }
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CategoriesFactory::new();
    }
}

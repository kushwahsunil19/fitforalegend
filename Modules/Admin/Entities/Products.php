<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

     protected $table = 'products';
     protected $fillable = [
        'master_category_id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'product_name',
        'slug',
        'current_price',
        'previous_price',
        'in_stock',
        'tax',
        'sku',
        'video_link',
        'short_description',
        'description',
        'specification_name',
        'specification_description',
        'attribute_id',
        'attribute_price',
        'color_id',
        'color_images',
        'image',
        'images',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'user_avg_rating',
        'status',

    ];
    public function brand()
    {
        return $this->belongsTo(Brands::class , 'brand_id', 'id');    
    }
   
      public function masterCategory()
    {
        return $this->belongsTo(MasterCategories::class , 'master_category_id', 'id');    
    }
      public function category()
    {
        return $this->belongsTo(Categories::class , 'category_id', 'id');    
    }
     public function subCategory()
    {
        return $this->belongsTo(Subcategories::class , 'sub_category_id', 'id');    
    }
    public function wishlist()
    {
       return $this->hasOne(Wishlist::class, 'product_id', 'id');
    }
      public function orderRating()
    {
       return $this->hasOne(OrderRating::class, 'product_id', 'id');
    }
    public function productSpecification()
    {
       return $this->hasMany(ProductSpecification::class, 'product_id', 'id');
    }
    public function productVariation()
    {
       return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }
     public function productImages()
    {
       return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }
   
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductsFactory::new();
    }
}

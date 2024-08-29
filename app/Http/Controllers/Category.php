<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Categories,Subcategories,MasterCategories,Products,Brands,Colors,ProductSize,ProductColor,ProductVariation,Sizes,ProductImages,OrderRating};
use DB;
class Category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         
         $input = $request->all();
         $master_category_id = isset($input['master_category_id'])?$input['master_category_id']:'';
         $master_id = isset($input['master_id'])?$input['master_id']:'';
         $category_id = isset($input['category_id'])?$input['category_id']:'';
         $sub_category_id = isset($input['sub_category_id'])?$input['sub_category_id']:'';
         $categoryId = isset($input['categoryId'])?$input['categoryId']:'';
         $brands = Brands::get();
         
         $searchText = trim($request->search);
        if($searchText!=''){
           $cat = Categories::where('categories.category_name','Like','%'.$searchText.'%')->first();
              if(!empty($cat)){
                   $master_category_id =  $cat->master_category_id;
                   $categoryId = $cat->id; 
                  
              }
           
                $query =  Products::query()->with('masterCategory')->with('category')->with('subCategory')->with('brand')->with('wishlist')->with('productVariation')->with('productSpecification')->with('productImages');
                $query = $query->where('products.product_name','Like','%'.$searchText.'%')
                ->orWhereHas('masterCategory',function ($query)use($searchText)
                {
                  $query->where('master_categories.master_category_name','Like','%'.$searchText);
                })
                 ->orWhereHas('category',function ($query)use($searchText)
                {
                  $query->where('categories.category_name','Like','%'.$searchText.'%');
                })
                 ->orWhereHas('subCategory',function ($query)use($searchText)
                {
                  $query->where('subcategories.subcategory_name','Like','%'.$searchText.'%');
                })
                 ->orWhereHas('brand',function ($query)use($searchText)
                {
                  $query->where('brands.brand_name','Like','%'.$searchText.'%');
                });
                $products = $query->get();
         }else{
                if($master_id!=''){
                    $where = array('master_category_id'=>$master_id);
                    $products = Products::where($where)->with('brand')->with('wishlist')->with('productVariation')->with('productSpecification')->with('productImages')->get();     
                }else if($category_id!='') {
                    $where = array('master_category_id'=>$master_category_id,'category_id'=>$category_id,'sub_category_id'=>$sub_category_id);
                    $products = Products::where($where)->with('brand')->with('wishlist')->with('productVariation')->with('productSpecification')->with('productImages')->get();     
                }else if($categoryId!=''){
                   $where = array('master_category_id'=>$master_category_id,'category_id'=>$categoryId);
                   $products = Products::where($where)->with('brand')->with('wishlist')->with('productVariation')->with('productSpecification')->with('productImages')->get();     
                }else{
                $products = Products::with('brand')->with('wishlist')->with('productVariation')->with('productSpecification')->with('productImages')->get();    
                } 
         }
         
         
      
         $subcategories = Subcategories::with(['category'])->get();
       
         $categories = Categories::with('masterCategory')->get();
      
        $masterCategories = MasterCategories::get();         
         $colors = Colors::get();   
         $sizes = Sizes::get();
         $productImages = ProductImages::get();
         $minPrice = Products::whereNotNull('current_price')->min("current_price");
         $maxPrice = Products::whereNotNull('current_price')->max("current_price");
        return view('category',compact('products','brands','sizes','subcategories','categories','colors','productImages','master_category_id','category_id','sub_category_id','masterCategories','minPrice','maxPrice','master_id','categoryId'));
       
    }
      /**
     * Display the specified resource.
     */
    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
             $sub_cat_ids = $input['sub_category_id'];
             $sub_category_ids = explode(",",$sub_cat_ids);
             $master_category_id = $input['master_category_id'];
             $brand_ids = $input['brand_id'];  
             $color_ids = $input['color_id'];
             $size_id = $input['size_id'];
             $min_price = isset($input['min_price'])?$input['min_price']:'';
             $max_price = isset($input['max_price'])?$input['max_price']:'';
             $priceFilter = isset($input['priceFilter'])?$input['priceFilter']:'';
             $ratingFilter = isset($input['ratingFilter'])?$input['ratingFilter']:'';
             $viewLimit = isset($input['viewLimit'])?$input['viewLimit']:'';
             $brands = Brands::get();
              $product_ids = [];
              if(!empty($size_id)){
               $att_id = explode(",",$size_id);
               $size = ProductVariation::whereIn('size_id', $att_id)->distinct()->get();

               foreach($size as $res){               
                   array_push($product_ids, $res->product_id);
               }
                $product_ids = array_unique($product_ids);
               
              }

               $pdt_ids = [];
              if(!empty($color_ids)){   
                
               $color_ids = explode(",",$color_ids);
               $colors = ProductVariation::whereIn('color_id', $color_ids)->distinct()->get();
              
               foreach($colors as $color){               
                   array_push($pdt_ids, $color->product_id);
               }
                $pdt_ids = array_unique($pdt_ids);    


              }
             $priceOrderBy='';
            if($priceFilter!=''){
                         if($priceFilter=='Hig to Low'){
                            $priceOrderBy='DESC';
                          
                         }else{
                            $priceOrderBy='ASC';
                         }
                      }
           
            $ratingOrderBy='';
            if($ratingFilter!=''){
                         if($ratingFilter=='Hig to Low'){
                            $ratingOrderBy='DESC';
                          
                         }else{
                            $ratingOrderBy='ASC';
                          
                         }
                      }
      
              
            if($viewLimit==''){
                $viewLimit =25;
            }
            if($viewLimit=='All'){
                $viewLimit =1000; 
            }
           
           
             $query = Products::query()->with('brand');  
                $query->with('wishlist');
                $query->with('orderRating');
                /*->with('productSize') */  
                $query->Where('master_category_id',$master_category_id);
                $query->whereIn('products.sub_category_id', $sub_category_ids)
               

                ->Where(function ($query) use ($brand_ids,$color_ids,$size_id,$min_price,$max_price,$priceFilter,$product_ids,$pdt_ids) {
                     if(!empty($brand_ids)){
                       $query->whereIn('products.brand_id', explode(",",$brand_ids)); 
                     }
                      if(!empty($size_id)){                      
                     $query->whereIn('products.id', $product_ids);
                     }
                      if(!empty($color_ids)){
                         $query->whereIn('products.id', $pdt_ids); 
                     }
                     if($min_price!='' && $max_price!=''){ 
                         $query->whereBetween('current_price', [$min_price, $max_price]);
                     }
                     
                });
                if($priceOrderBy!=''){
                     $query->orderBy('products.current_price',  $priceOrderBy);  
                }
                if($ratingOrderBy!=''){
                $query->orderBy('products.user_avg_rating',  $ratingOrderBy); 
                }
                $query->limit($viewLimit);
                $products = $query->get();
             $viewDesign = isset($input['viewDesign'])?$input['viewDesign']:'';
             $minPrice = Products::whereNotNull('current_price')->min("current_price");
             $maxPrice = Products::whereNotNull('current_price')->max("current_price");
               return view('ajax.filter_products',compact('products','brands','minPrice','maxPrice'));
                 die();
        }
    }

      /**
     * Display the specified resource.
     */
    public function filterByMastercategory(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
             $master_category_id = $input['master_category_id'];
                $categories = Categories::where('master_category_id',$master_category_id)->with('masterCategory')->get();
                $subcategories = Subcategories::with(['category'])->get();
               return view('ajax.filterByMasterCategory',compact('categories','subcategories','master_category_id'));
                 die();
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

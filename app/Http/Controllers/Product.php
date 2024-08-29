<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Products,Attributes,Colors,Cart,OrderRating,ProductVariation,Size,MasterCategories,Coupons};
use Illuminate\Support\Facades\Auth;
use DB;
class Product extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $product_name = trim($request->search);
        if($product_name !=''){
            $product = Products::with(['brand'])->with(['orderRating'])->with('productVariation')->with('productSpecification')->with('productImages')->where('product_name',$product_name)->first(); 
            $products = Products::with(['brand'])->with(['orderRating'])->with('productVariation')->with('productSpecification')->with('productImages')->get();  
            if(isset($product->id)){
                $ratings = OrderRating::with('product')->with('user')->where('product_id',$product->id)->get(); 
                $variations =  ProductVariation::where('product_id',$product->id)->groupBy('size_id')->get();  
                return view('product',compact('products','product','ratings','variations'));
            }

        }
        $data['title'] = 'Home'; 
        $masterCategories = MasterCategories::with('products')->latest()->get();
        $coupon = Coupons::latest()->first();     
        return view('home',compact('masterCategories','coupon'));
    }

     // Auto search List On Home
        public function productSuggestions(Request $request){     
            $search = trim($request->search);
           
           if($search)
             {        
            $data = Products::where('product_name','like',"%{$search}%")->get();
              $result = '<ul class="search-options" style="display:block; position:relative">';
              if(!empty($data)){
                foreach($data as $row)
                  {
                   $result .= '<li><a>'.$row->product_name.'</a></li>';
                  }
              }
              
              $result .= '</ul>';             
              echo $result;
             }

    }
    public function checkProductStock(Request $request){
        $input = $request->all();
        if($input['vid']!=''){           
         $variation = getProductVariation($input['vid']);
         $variations = ProductVariation::with('size')->with('color')->with('product')->where(['product_id'=>$variation->product_id,'size_id'=>$variation->size_id])->get();

          $data['in_stock'] = ($variation->in_stock)?$variation->in_stock:'OutOfStock'; 
          $html ='';
          $i = 0;
          foreach($variations as $res){
            $html.='<li class="if($i<=0)active @endif" >
                            <a href="" class="color" data-value="'.$res->color_id.'" data-toggle="tooltip" data-placement="top" data-original-title="'.$res->color->color_name.'" style="background:'.$res->color->color_code.'; width:50px!important;min-width:50px; height:50px !important;border: 1px solid #bfc0c6 !important;"   data-v_ID="'.$res->id.'"    data-previous_Price="'.$res->product->previous_price.'"><span class="image-container image-container--product"> '.$res->color->color_code.'</span></a>
                        <li>';

                  $i++;   
                   $data['variation_price'] =$variation->variation_price; 
          }
            $data['colorhtml'] =$html;

            
         return response()->json($data);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
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

        $product = Products::with(['brand'])->with('masterCategory')->with('category')->with('subCategory')->with(['orderRating'])->with('productVariation')->with('productSpecification')->with('productImages')->findOrFail($id);
        $variations =  ProductVariation::where('product_id',$id)->groupBy('size_id')->get();  
        
        $products = Products::with(['brand'])->with(['orderRating'])->with('productVariation')->with('productSpecification')->with('productImages')->get();
        $ratings = OrderRating::with('product')->with('user')->where('product_id',$id)->get();
         return view('product',compact('product','variations','products','ratings'));
       
      
     
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

<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Brands;
use Modules\Admin\Entities\MasterCategories;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Subcategories;
use Modules\Admin\Entities\Products;
use Modules\Admin\Entities\Attributes;
use Modules\Admin\Entities\{Colors,ProductSize,ProductColor,ProductVariation,Sizes,ProductImages,ProductSpecification};
use Yajra\DataTables\DataTables;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
      
      if ($request->ajax()) {
        $data = Products::latest()->get();
        return Datatables::of($data)        
        ->addIndexColumn()
        ->addColumn('image', function($row){                 
         $url=asset("public/uploads/products/$row->image"); 
         $image = '<img src="'. $url.'" border="0" width="40" class="img-rounded" align="center" />';
         return $image;
     })


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url = route('products.edit',$row->id);
            $urlView = route('products.show',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a> <a href="'.$urlView.'" class=" btn btn-success btn-sm"><i class="fa fa-eye "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['image','action'])
        ->make(true);
      }     
         return view('admin::products.product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

       $brands = Brands::get(); 
       $masterCategories = MasterCategories::get(); 
       $sizes = Sizes::get();
       $colors = Colors::get();
       return view('admin::products.product.add',compact('masterCategories','brands','sizes','colors'));
    }
      /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCategories(Request $request)
    {
          $data['categories'] = Categories::where("master_category_id", $request->master_category_id)
                                ->get(["category_name", "id"]);  
        return response()->json($data);
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchSubCategories(Request $request)
    {
        $data['subcategories'] = Subcategories::where("category_id", $request->category_id)
                                    ->get(["subcategory_name", "id"]);
                                      
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       
          $request->validate([
            'product_name' => 'required',     
            'current_price' => 'required|numeric',
            'previous_price' => 'required|numeric',
            'master_category_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'sub_category_id' => 'required|numeric',
            'brand_id' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
           
         ]);

            $input = $request->all();
            if($request->file()) {
                    $path = public_path('uploads/products');
                    if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                 }
                if($image = $request->file('image')) {
                $new_name = time() . '_' . $image->getClientOriginalName();
                $image->move($path, $new_name);
                $inputData['image']=  $new_name; 
                }                                   
            }
            $inputData['product_name']=$input['product_name']; 
            $inputData['current_price']=$input['current_price']; 
            $inputData['previous_price']=$input['previous_price']; 
            $inputData['master_category_id']=$input['master_category_id']; 
            $inputData['category_id']=$input['category_id']; 
            $inputData['sub_category_id']=$input['sub_category_id']; 
            $inputData['brand_id']=$input['brand_id'];
            $inputData['sku']=$input['sku']; 
            $inputData['video_link']=$input['video_link'];
            $inputData['short_description']=$input['short_description'];
            $inputData['description']=$input['description'];
            $inputData['tax']=$input['tax'];
            $inputData['slug']=$input['slug'];
            $inputData['in_stock']= $input['assessary_stock'];
            $product_id = Products::create( $inputData)->id; 
          if($product_id > 0){

           if(!empty($input['color_id'][0])){
       
             foreach($input['color_id'] as $key=> $res){
                   $productVariationData['product_id'] = $product_id; 
                    $productVariationData['size_id'] = $input['size_id'][$key];
                    $productVariationData['color_id'] = $input['color_id'][$key];
                    $productVariationData['in_stock'] = $input['in_stock'][$key];
                    $productVariationData['variation_price'] = $input['variation_price'][$key];
                    $productVariationData['created_at'] = now();
                    $productVariationData['updated_at'] = now();
                    $insertVariationData[] = $productVariationData;
                  }   
              
                ProductVariation::insert( $insertVariationData);
                  }
            if(!empty($input['specification_name'][0])){
             foreach($input['specification_name'] as $key=> $res){ 
                    $data['product_id'] = $product_id; 
                    $data['specification_name'] = $input['specification_name'][$key];  
                    $data['specification_description'] = $input['specification_description'][$key];
                    $data['created_at'] = now();
                    $data['updated_at'] = now();
                    $insertData[] = $data;
                  }  
                  ProductSpecification::insert( $insertData);
                  }
                   $images = [];
               if($files=$request->file('images')) {
                foreach($files as $file){
                    $name= rand().time() . '_' . $file->getClientOriginalName();
                    $file->move($path, $name);
                    $images['product_id'] = $product_id; 
                    $images['images']= $name; 
                    $images['created_at'] = now();
                    $images['updated_at'] = now();
                    $imgdata[]=$images;
                           
                }
                 ProductImages::insert( $imgdata);          
            }
          }
        
        return back()->with('success','Product has been created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       $product = Products::with('orderRating')->with('brand')->with('productVariation')->with('productSpecification')->with('ProductImages')->with('masterCategory')->with('subCategory')->with('masterCategory')->findOrFail($id);
       
       $brand = Brands::findOrFail($product->brand_id);  
   
       $masterCategory = MasterCategories::findOrFail($product->master_category_id);
       $category = Categories::findOrFail($product->category_id);
       $subcategory = Subcategories::findOrFail($product->sub_category_id);
       $color_ids = ($product->color_id!='')?explode(",",$product->color_id):[];
       $colors = ($color_ids!='')?Colors::whereIn('id',$color_ids)->get():[];
       return view('admin::products.product.show',compact('product','brand','masterCategory','category','subcategory','colors'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
       $product = Products::with('orderRating')->with('brand')->with('productVariation')->with('productSpecification')->with('ProductImages')->with('masterCategory')->with('subCategory')->with('masterCategory')->findOrFail($id);

       $sizes = Sizes::get();
       $masterCategories = MasterCategories::get();
       $categories = Categories::where('id',$product->category_id)->get();    
       $subcategories = Subcategories::where('id',$product->sub_category_id)->get();    
       $colors = Colors::get();    
       $brands = Brands::get();          
     
       return view('admin::products.product.edit',compact('product','sizes','colors','masterCategories','categories','subcategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',     
            'current_price' => 'required|numeric',
            'image'=>'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
           
         ]);

            $input = $request->all();        
             if($request->file()) {
                $path = public_path('uploads/products');
                if (!is_dir($path)) {
                mkdir($path, 0777, true);
             }
            if($image = $request->file('image')) {
            $new_name = time() . '_' . $image->getClientOriginalName();
            $image->move($path, $new_name);
            $inputData['image']=  $new_name; 
            }
            
        }
         if($id > 0){

           if(!empty($input['color_id'])){
             foreach($input['color_id'] as $key=> $res){
                   $productVariationData['product_id'] = $id; 
                    $productVariationData['size_id'] = $input['size_id'][$key];
                    $productVariationData['color_id'] = $input['color_id'][$key];
                    $productVariationData['in_stock'] = $input['in_stock'][$key];
                    $productVariationData['variation_price'] = $input['variation_price'][$key];                  
                   $productVariationData['updated_at'] = now();
                  
                    $where['id'] = isset($input['variation_id'][$key])?$input['variation_id'][$key]:'';
                    $where['product_id'] = $id; 
                    ProductVariation::updateOrCreate($where,$productVariationData); 
                  }
                
                  }
                   if(!empty($input['specification_name'])){
             foreach($input['specification_name'] as $key=> $res){ 
                    $data['product_id'] = $id; 
                    $data['specification_name'] = $input['specification_name'][$key];  
                    $data['specification_description'] = $input['specification_description'][$key];                   
                    $data['updated_at'] = now();
                    $whr['product_id'] = $id; 
                    $whr['id'] = isset($input['specification_id'][$key])?$input['specification_id'][$key]:'';
                    $insertData[] = $data;
                      ProductSpecification::updateOrCreate($whr,$data);/* ProductSpecification::where('id','!=',$input['specification_id'][$key])->delete();
*/
                  } 


                  }
                   $images = [];
               if($files=$request->file('images')) {
                foreach($files as $key =>$file){
                    $name= rand().time() . '_' . $file->getClientOriginalName();
                    $file->move($path, $name);
                    $images['product_id'] = $id; 
                    $images['images']= $name;                    
                    $images['updated_at'] = now();
                    $whrs['id']=isset($input['image_id'][$key])?$input['image_id'][$key]:'';
                    $whrs['product_id']=$id;
                 
                     ProductImages::updateOrCreate($whrs,$images);
                           
                }
                         
            }
        }
            unset($input['_token']);
            unset($input['_method']);
            $inputData['product_name']=$input['product_name']; 
            $inputData['current_price']=$input['current_price']; 
            $inputData['previous_price']=$input['previous_price']; 
            $inputData['master_category_id']=$input['master_category_id']; 
            $inputData['category_id']=$input['category_id']; 
            $inputData['sub_category_id']=$input['sub_category_id']; 
            $inputData['brand_id']=$input['brand_id'];
            $inputData['sku']=$input['sku']; 
            $inputData['video_link']=$input['video_link'];
            $inputData['short_description']=$input['short_description'];
            $inputData['description']=$input['description'];
            $inputData['tax']=$input['tax'];
            $inputData['slug']=$input['slug'];
            $inputData['in_stock']= isset($input['assessary_stock'])?$input['assessary_stock']:'';
            Products::whereId($id)->update($inputData);  

        return back()
        ->with('success','Product has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $com = Products::where('id',$id)->delete();    
         ProductSize::where('product_id',$id)->delete();    
         ProductColor::where('product_id',$id)->delete();     
        return Response()->json($com);
    }

    public function deleteImages(Request $request){
        $input = $request->all();
        $com = ProductImages::where('id',$input['img_id'])->delete();  
    }
    public function deleteSpecification(Request $request){
        $input = $request->all();
        $com = ProductSpecification::where('id',$input['s_id'])->delete();  
    }
    public function deleteVariation(Request $request){
        $input = $request->all();
        $com = ProductVariation::where('id',$input['v_id'])->delete();  
    }
}

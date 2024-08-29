<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Categories,Subcategories,MasterCategories,Carts,Coupons,UserCoupon,Products,ProductVariation,Size};
use Illuminate\Support\Facades\Auth;
class Cart extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
      
        if(Auth::check()){
             $items =  Carts::with('productVariation')->where('user_id',Auth::user()->id)->with('product')->get();
           return view('cart',compact('items'));
        }  
        return redirect("login")->withSuccess('Opps! You do not have access');  
        
     
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
        $input = $request->all();

         if(Auth::check()){
              $input['user_id'] = auth()->user()->id;
              $input['quantity'] = $input['quantity'];  
        
        if($input['variation_id']>0){
         
            $where = [
                    'user_id'=> $input['user_id'],
                    'product_id'=>$input['product_id'],
                    'variation_id'=>$input['variation_id']
                 ]; 
        }else{
             
                $where = [
                    'user_id'=> $input['user_id'],
                    'product_id'=>$input['product_id']
                 ]; 
        }
       
        $product = Products::with('productVariation')->where('id',$input['product_id'])->first();
        $in_stock = 0;
       if(count($product->productVariation)>0){
        foreach($product->productVariation as $res){
            if($input['variation_id']==$res->id && $input['product_id']==$res->product_id){
                 $in_stock = $res->in_stock; 
            }
        }
       }else{
        $in_stock = isset($input['is_stock'])?$input['is_stock']:0; 
       }
    
        $check = Carts::where($where)->first();
        if(!empty($check)){        
           $input['quantity'] = $input['quantity']; 
            $data['in_stock'] = ($in_stock)?$in_stock:'OutOfStock'; 
           $data['cart_count'] =$input['cart_count']; 
        }else{ 
           $input['quantity'] = $input['quantity'];  
           $data['in_stock'] = ($in_stock)?$in_stock:'OutOfStock';
            $data['cart_count'] = $input['cart_count'] + $input['quantity'];
        }  
        if($in_stock){
           Carts::updateOrCreate($where,$input);   
        }
       
         }else{
             $data['Is_login'] = 'Not';
         }
        
       

      return response()->json($data);

    }

    public function couponApply(Request $request){
       $input = $request->all();
       $currentDate = date('Y-m-d',strtotime(now()));
       $userId = auth()->user()->id;
       $userCouponCount = UserCoupon::where(['user_id'=>$userId,'order_status'=>'Ordered' ])->count();
       $res = Coupons::where('code',$input['coupon_code'])->whereDate('expiry_date','>=', $currentDate)->first();
       if($userCouponCount<2){
            if(!empty($res)){
            $data['coupon_id'] = $res->id;
            $data['discount'] = $res->discount;
            $data['msg'] = 'Applied';  
            }else{
            $data['discount'] = '';        
            $data['msg'] = 'Invalid Coupon Code!';  
            }
       }else{
            $data['discount'] = '';        
            $data['msg'] = 'Per user only 2 times apply coupon code!';  
       }
       
      return response()->json($data);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
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
    public function update(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['quantity'] = $input['quantity'];  
        $where = [
                    'user_id'=> $input['user_id'],'product_id'=>$input['product_id'],'color_id'=> $input['color_id'],'size_id'=> $input['size_id']
                 ]; 
        $check = Carts::where($where)->first();    
        if(!empty($check)){
           $input['quantity'] = $input['quantity'];   
        }           
        Carts::updateOrCreate($where,$input); 
        return back()
        ->with('success','Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {        
        $com = Carts::where('id',$id)->delete();   
        return Response()->json($com);
    }
}

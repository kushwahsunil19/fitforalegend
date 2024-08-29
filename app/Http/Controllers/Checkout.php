<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Carts,Orders,Country,State,City,Coupons,UserCoupon,Products,ProductVariation,Size,OrderDetails,User};
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use Stripe\Exception\CardException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;
class Checkout extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
      if(Auth::check()){
       $countries = Country::get(["name", "id"]);      
       $items =  Carts::with('productVariation')->where('user_id',Auth::user()->id)->with('product')->get();
       $userCoupon = UserCoupon::with('coupon')->where('user_id',Auth::user()->id)->where('order_status','Processing')->latest()->first();

       return view('checkout',compact('items','countries','userCoupon'));

   }  
   return redirect("login")->withSuccess('Opps! You do not have access');  

}

public function userCheckout(Request $request)
{ 
    $input = $request->all();
    $data['in_stock'] ='IsStock';
    if(Auth::check()){

        if(!empty($input['product_id'])){
            $product_id = explode(",", $input['product_id']);
            $variation_id = explode(",", $input['variation_id']);
            $products = Products::with('productVariation')->whereIn('id',$product_id)->get();
            $variation = ProductVariation::whereIn('id',$variation_id)->get();
            $is_stock =[];
            foreach($variation as $key => $variation){

             $is_stock[]= $variation->in_stock;
         }
         $data['in_stock'] = (in_array("0", $is_stock))?'OutOfStock':'IsStock';
     }


     $userId = Auth::user()->id;  
     $res = UserCoupon::where(['user_id'=>$userId])->first(); 
   
     if( $input['coupon_id']=='')
     { 
       $com = UserCoupon::where(['user_id'=>$userId,'order_status'=>'Processing'])->delete();     
       return response()->json($data);
     }

       if($input['coupon_id']!=''){
           $count = UserCoupon::where(['user_id'=>$userId,'coupon_id'=>$input['coupon_id']])->count(); 
           $input['user_id'] =  $userId;
          
           if($count>0){
             UserCoupon::create( $input);   
           //UserCoupon::where(['user_id'=>$userId,'coupon_id'=>$input['coupon_id'] ])->update($input);
         }else{
            
            UserCoupon::create( $input);   
        }
     }

   }  
    return response()->json($data);
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
    {   $input = $request->all();
  
    //   $validation = $request->validate([
    //     'cvv' => 'required|min:3|numeric',
    //     'cart_no' => 'required',
    //     'address1' => 'required',
    //     'country' => 'required', 
    //     'state' => 'required', 
    //     'zipcode'=>'required', 

    // ]);
        $userId = Auth::user()->id;  
      if($input['payment_type'] =='Credit Card' ||  $input['payment_type'] =='Debit Card'){
        try{
              

         //  return $request->stripeToken;
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            $charge = Stripe\Charge::create ([
                    "amount" =>  (int) round(($input['total_amount']), 0),
                    "currency" => "usd",
                    "source" => 'tok_visa',//$request->stripeToken,
                    "description" => "Test payment from itsolutionstuff.com." 
                    
                ]);

                $orderData['transaction_id'] = isset($charge->id)?$charge->id:'';  
                $orderData['user_id'] = auth()->user()->id;  
                unset($input['_token']); 
                $orderData['shipping_address'] =$input['shipping_address'];
                $orderData['country'] =$input['country'];
                $orderData['state'] =$input['state'];
                $orderData['zipcode'] =$input['zipcode'];
                $orderData['address1'] =$input['address1'];
                $orderData['payment_type'] =$input['payment_type'];
                $orderData['month'] =$input['month'];
                $orderData['year'] =$input['year'];
                $orderData['cart_no'] =$input['cart_no'];
                $orderData['total_amount'] =$input['total_amount'];

                $orderID = Orders::create($orderData)->id;

                foreach($input['product_id'] as $key=> $product_id){ 
                    $variation = ProductVariation::with('size')->with('product')->where('id',$input['variation_id'][$key])->first();
                    $product = Products::where('id',$product_id)->first();
                  
                   
                   
                     if(isset($variation->in_stock)){
                         $in_stock = (int)(isset($variation->in_stock)?$variation->in_stock:0 )- (int)(isset($input['quantity'][$key])?$input['quantity'][$key]:0);
                         $used_stock = (int)$variation->used_stock + (int)(isset($input['quantity'][$key])?$input['quantity'][$key]:0);   
                        ProductVariation::where(['id'=>$variation->id])->update(['in_stock'=> $in_stock,'used_stock'=>$used_stock]);
                     }else{
                         $in_stock = (int)(isset($product->in_stock)?$product->in_stock:0 )- (int)(isset($input['quantity'][$key])?$input['quantity'][$key]:0);
                        Products::where(['id'=>$product_id])->update(['in_stock'=> $in_stock]);
                     }
                    
                    $datailData['order_id'] =$orderID;
                    $datailData['product_id'] =$product_id;
                    $datailData['variation_id'] =isset($input['variation_id'][$key])?$input['variation_id'][$key]:0;
                    $datailData['quantity'] =$input['quantity'][$key];
                    $datailData['variation_price'] =isset($variation->variation_price)?$variation->variation_price:$product->current_price; 

                   OrderDetails::create($datailData);
                }
                
                $cart = Carts::where('user_id',auth()->user()->id)->delete();   
                $order = Orders::with('user')->where('id',$orderID)->first();
                UserCoupon::where(['user_id'=>$userId,'order_status'=>'Processing' ])->update(['order_status'=>'Ordered']);
                return view('thankyou',compact('order'));

            } catch (CardException $th) {
                throw new Exception("There was a problem processing your payment", 1);
            }

            return back()->with('success', 'Payment successful!');
        }else if($input['payment_type'] =='PayPal'){
           $cmd = $input['cmd'];
           $business = $input['business'];
           $shipping_address = $input['shipping_address'];
           $total_amt = $input['total_amount'];
           $state = $input['state'];
           $zip = $input['zipcode'];
           $user = User::where('id',Auth::user()->id)->with('order')->first();   
           $return = $input['return'];
           $url = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=$cmd&business=$business&item_name=hat&amount=$total_amt&first_name=$user->first_name&last_name=$user->last_name&address1=$shipping_address&state=$state&zip=$zip&email=sb-cocgt27872584@personal.example.com&return=$return";
           
            
            
                $orderData['user_id'] = auth()->user()->id;  
                unset($input['_token']); 
                $orderData['shipping_address'] =$input['shipping_address'];
                $orderData['country'] =$input['country'];
                $orderData['state'] =$input['state'];
                $orderData['zipcode'] =$input['zipcode'];
                $orderData['address1'] =$input['address1'];
                $orderData['payment_type'] =$input['payment_type'];
                $orderData['month'] =$input['month'];
                $orderData['year'] =$input['year'];
                $orderData['cart_no'] =$input['cart_no'];
                $orderData['total_amount'] =$input['total_amount'];

                $orderID = Orders::create($orderData)->id; 
              
                foreach($input['product_id'] as $key=> $product_id){ 
                    $variation = ProductVariation::with('size')->with('product')->where('id',$input['variation_id'][$key])->first();
                    $product = Products::where('id',$product_id)->first();
                  
                   
                   
                     if(isset($variation->in_stock)){
                         $in_stock = (int)(isset($variation->in_stock)?$variation->in_stock:0 )- (int)(isset($input['quantity'][$key])?$input['quantity'][$key]:0);
                         $used_stock = (int)$variation->used_stock + (int)(isset($input['quantity'][$key])?$input['quantity'][$key]:0);   
                        ProductVariation::where(['id'=>$variation->id])->update(['in_stock'=> $in_stock,'used_stock'=>$used_stock]);
                     }else{
                         $in_stock = (int)(isset($product->in_stock)?$product->in_stock:0 )- (int)(isset($input['quantity'][$key])?$input['quantity'][$key]:0);
                        Products::where(['id'=>$product_id])->update(['in_stock'=> $in_stock]);
                     }
                    
                    $datailData['order_id'] =$orderID;
                    $datailData['product_id'] =$product_id;
                    $datailData['variation_id'] =isset($input['variation_id'][$key])?$input['variation_id'][$key]:0;
                    $datailData['quantity'] =$input['quantity'][$key];
                    $datailData['variation_price'] =isset($variation->variation_price)?$variation->variation_price:$product->current_price; 

                   OrderDetails::create($datailData);
                }
                
                
              
               UserCoupon::where(['user_id'=>$userId,'order_status'=>'Processing' ])->update(['order_status'=>'Ordered']);
               
                  return  redirect()->to($url);
                   
                return view('thankyou',compact('order'));
         

         
    }


}

public function orderCanceled(){
    
}

public function paymentCancel()
{
    return redirect()
    ->route('create.payment')
    ->with('error', $response['message'] ?? 'You have canceled the transaction.');
}

public function paymentSuccess(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();
    $response = $provider->capturePaymentOrder($request['token']);
    if (isset($response['status']) && $response['status'] == 'COMPLETED') {
        return redirect()
        ->route('create.payment')
        ->with('success', 'Transaction complete.');
    } else {
        return redirect()
        ->route('create.payment')
        ->with('error', $response['message'] ?? 'Something went wrong.');
    }
}

public function orderedThankYou(Request $request){
 
    if(Auth::check()){
    
      $order = Orders::with('user')->where('user_id',auth()->user()->id)->latest()->first();
    
     
      if($request->get('PayerID')!=''){
       $orderData['transaction_id'] = $request->get('PayerID');  
       Orders::where('id',$order->id)->update($orderData);
       $cart = Carts::where('user_id',auth()->user()->id)->delete();   
      }
        return view('thankyou',compact('order'));
  }
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

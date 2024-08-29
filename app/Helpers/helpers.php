<?php 
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\{Carts,Products,Colors,Attributes,Wishlist,OrderRating,Sizes,ProductVariation,Orders};
	function itemCount(){
	 if(Auth::check()){
		$itemCount =  Carts::where('user_id', auth()->user()->id)->count(); 
		return $itemCount;	
		}	
		return 0;	
	}
	function getProduct($id){
		$product = Products::with('brand')->findOrFail($id);
		return $product;

	}
	function getProductColor($id){
		$color = Colors::findOrFail($id);
		return $color;
	}

	function getSizeWiseColor($product_id,$size_id){
		$color = ProductVariation::with('color')->where(['product_id'=>$product_id,'size_id'=>$size_id])->get();
		if(!empty($color)){
		return $color;
		}
		return array();
	}
	function getProductAttribute($id){	
    	if($id)	{
    		$attribute = Attributes::findOrFail($id);
    		return $attribute;
    	}
		
		return array();
	}
	function getProductSize($id){	
    	if($id)	{
    		$attribute = Sizes::findOrFail($id);
    		return $attribute;
    	}
		
		return array();
	}
	function getProductVariation($id){	

    	if($id)	{
    		$variation = ProductVariation::with('size')->with('color')->findOrFail($id);
    		return $variation;
    	}
		
		return array();
	}


	function getProductWishlist($product_id){
	if(Auth::check()){	
			if($product_id)	{
				$where = array('user_id'=>auth()->user()->id,'product_id'=>$product_id );
				$wishlist = Wishlist::where($where)->first();
				return $wishlist;
			}
		}
		return array();
	}
    function getUserRatings($product_id){
    	
    			$data = OrderRating::select( DB::raw('ROUND(AVG(user_rating),2) as avg_rating'),DB::raw('count(id) as user_count') )
    			->where('product_id',$product_id)
    			->get();
    		   if(!empty($data)){
    		   	return $data;
    		   }
    		   return 0;
    	}
    function getOrderNotification(){
          $currentDate = date('Y-m-d',strtotime(now()));
          $orders = Orders::with('user')->with('orderDetail')->where('status','ORDERED')->where('read_status','Unread')->latest()->get();    
          return $orders;
    }
	
?>
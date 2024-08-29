@extends('layouts.master')
@section('content')

    <style>
        body.equal-height .prd-img:not(.prd-img--noequal) img {
    object-fit: contain;
}
.inStock {
    /*background: green;*/
    color: green;
    padding: 3px;
}
.outOfStock {
    /*background: red;*/
    color: red;
    padding: 3px;
}
.cart-table-prd2 {
    min-height: 165px;
}
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="success"> </div>
<div class="page-content">
	<div class="holder breadcrumbs-wrap mt-0">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="{{ route('home.index')}}">Home</a></li>
			<li><span>Cart</span></li>
		</ul>
	</div>
</div>
	<div class="holder">
	<div class="container">
		<div class="page-title text-center">
			<h1>Shopping Cart</h1>
		</div>
		<div class="row">
			<div class="col-lg-11 col-xl-13">
				<div class="cart-table">
	<div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
		<div class="cart-table-prd-image text-center">
			Image
		</div>
		<div class="cart-table-prd-content-wrap">
			<div class="cart-table-prd-info">Name</div>
			<div class="cart-table-prd-qty">Qty</div>
			<div class="cart-table-prd-price">Price</div>
			<div class="cart-table-prd-action">&nbsp;</div>
		</div>
	</div>
    <?php $total_price = 0; $is_stock = []; $product_id = [] ?>
    @if(!empty($items))
    @foreach($items as $item)
	<div class="cart-table-prd cart-table-prd2">
		<div class="cart-table-prd-image">
			<a href="{{route('product.show',$item->product->id)}}" class="prd-img">
				<img class="lazyload fade-up" src="{{asset('public/uploads/products/')}}/{{$item->product->image }}" data-src="{{asset('public/uploads/products/')}}/{{$item->product->image }}" alt=""></a>
		</div>
		<div class="cart-table-prd-content-wrap">
			<div class="cart-table-prd-info">
			    
			    
				<h2 class="cart-table-prd-name"><a href="{{route('product.show',$item->product->id)}}">{{ $item->product->product_name}}</a></h2>
                <?php 
              
                $variation_price = $item->variation_price;
                $variation = getProductVariation($item->variation_id);
                $in_stock = isset($variation->in_stock)?$variation->in_stock:$item->product->in_stock;
                ?>
                @if(!empty($variation))
                <p> <strong>Size :{{$variation->size->size_name}} , </strong> <strong>Color :{{$variation->color->color_name}} </strong></p>
			    @endif
				<div class="cart-table-prd-price">
                
					<div class="price-new">${{ $variation_price }} <span class="prd-block_price--old" >${{$item->product->previous_price}}</span> <p>{{ $percentage = round( ( $item->product->previous_price - $item->product->current_price ) / $item->product->previous_price * 100 ).'%';}} off</p></div>
			  
				</div>
               <p style="margin-top:10px;"> <strong class="in_stock{{$item->id}} @if($in_stock) inStock @else outOfStock @endif"> @if($in_stock)In Stock (only {{$in_stock}} left )@else Out of stock @endif</strong></p>
			</div>
			 @if($in_stock)
			<div class="cart-table-prd-qty">
				<div class="prd-block_qty">
					<div class="qty qty-changer">
					
					     <input type="hidden" name="" id="in_stock{{ $item->id}}" value="{{ $in_stock}}">
                        <input type="hidden" name="" id="variation_id{{ $item->id}}" value="{{ $item->variation_id}}">
                        <input type="hidden" name="" id="productId{{ $item->id}}" value="{{ $item->product_id}}">
                         <input type="hidden" name="" id="price{{ $item->id}}" value="{{ $variation_price}}">
						<button class="decrease js-qty-button " data-sign="-" data-itemId="{{ $item->id}}"></button>
						<input type="number" class="qty-input" id="qty{{ $item->id}}" name="quantity" value="{{ $item->quantity}}" data-min="1" data-max="1000">
						<button class="increase js-qty-button plus{{ $item->id}}" data-sign="+" data-itemId="{{ $item->id}}"></button>
					</div>
				</div>
			</div>
			<div class="cart-table-prd-price-total ItemTotalPrice{{ $item->id}}">
				${{ $variation_price * $item->quantity}}
              
			</div>
			
			@endif
            <?php  $is_stock[] =$in_stock;
                   $product_id[] = $item->product->id;
                   $variation_id[] =$item->variation_id;

            ?>

		</div>
		<div class="cart-table-prd-action">
			<a  class="cart-table-prd-remove deleteItem"  data-item="{{ $item->id}}" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>            
		</div>
	
		</div>
       <?php 
          $total_price += (float)$variation_price * $item->quantity;
         
        ?>
        
    @endforeach    
    @endif  
    <?php  if (in_array("0", $is_stock))
  {
     $is_stock = 0;
  }else{
  	$is_stock = 1;
  }
  ?>
   	<input type="hidden" name="" id="is_stock" value="@if($is_stock){{  $is_stock }} @else {{  $is_stock}}@endif">
	<!-- <div class="cart-table-prd">
		<div class="cart-table-prd-image">
			<a href="product.html" class="prd-img"><img class="lazyload fade-up" src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-1.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-1.webp" alt=""></a>
		</div>
		<div class="cart-table-prd-content-wrap">
			<div class="cart-table-prd-info">
				<div class="cart-table-prd-price">
					<div class="price-new">$75.00</div>
				</div>
				<h2 class="cart-table-prd-name"><a href="product.html">Oversize Cotton Dress</a></h2>
			</div>
			<div class="cart-table-prd-qty">
				<div class="prd-block_qty">
					<div class="qty qty-changer">
						<button class="decrease js-qty-button"></button>
						<input type="number" class="qty-input" name="quantity" value="1" data-min="1" data-max="1000">
						<button class="increase js-qty-button"></button>
					</div>
				</div>
			</div>
			<div class="cart-table-prd-price-total">
				$360.00
			</div>
		</div>
		<div class="cart-table-prd-action">
			<a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
		</div>
	</div> -->
</div>
				<div class="d-none d-lg-block">
					<div class="mt-4"></div>
				</div>
			</div>
			<div class="col-lg-7 col-xl-5 mt-3 mt-md-0 p-0">
				
				<div class="card-total">
				<div class="d-block mb-1">Price Details 
                ({{count($items)}} item)</div>
                <input type="hidden" value="{{itemCount()}}" id="cartCount">
	<div class="row d-flex flex-wrap mt-0 justify-content-between total-sec">
		
		 <input type="hidden" name="" id="total_price" value="{{ $total_price }}">  	
		<div class="col-9 card-total-txt  ">Total  MRP</div>
		<div class="col-auto card-total-price text-right  col-9 totalPrice">${{$total_price}}.00</div>
		
		<div class="col-9 card-total-txt  mt-0">Coupon Discount</div>
		<div class="col-auto card-total-price text-right  col-9">
		    <a href="javascript:;" class="card-total-price2 text-success discount_amt"> - $0.00</a></div>
       

		
	</div>
	
	<div class="coupon_code">
		<input type="hidden" name="coupon_id" value="" id="coupon_id">
		<input type="hidden" name="discount" value="" id="discount">
		<input type="hidden" name="coupon_dis_amt" value="" id="coupon_dis_amt">
	    <input type="text" class="form-control" id="coupon_code" placeholder="Apply Coupon Code" />

	    <div class="msg"></div>
	    <a class="coupon_apply">
	    <button type="button"> Apply </button>
	    </a>
	</div>
	
	<div class="row d-flex flex-wrap mt-0 justify-content-between total-amt">

		<div class="col-9 card-total-txt  mt-0">Total Amount</div>
		<div class="col-auto card-total-price text-right  col-9 netTotalPrice">${{$total_price}}.00</div>
		
	</div>
      <input type="hidden" name="product_id" id="product_id" value="{{ implode(',', $product_id)}}">
      @if(isset($variation_id))
      <input type="hidden" name="vid" id="vid" value="{{ implode(',', $variation_id)}}">
      @endif
	<a class="checkout"><button class="btn btn--full btn--lg " @if(itemCount()==0) disabled @endif><span>Checkout</span></button></a>
	
</div>
				<div class="mt-2"></div>
			</div>
		</div>
	</div>
</div>
</div>

<style>
.coupon_code{
    width:100%;
    background: none;
    padding: 1px 0px 10px;
    margin-top: 0px !important;
    position: relative;
}
.coupon_code input {
    padding: 15px 10px;
    height: auto;
    font-size: 15px;
    font-weight: 600;
    color: #000;
    padding-right: 80px;
}
.coupon_code button {
    position: absolute;
    top: 0;
    right: 0;
    padding: 15px 15px;
    border: none;
    background: #00c8ab;
    color: #fff;
    font-weight: 600;
}
.cart-table-prd{
    margin-bottom: -1px;
}

</style>

<script type="text/javascript">

 $(document).ready(function(){
     $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
    var totalPrice = 0;       

    $(document).on('click','.js-qty-button',function(){
      
        var sign= $(this).attr('data-sign');
        var item_id = $(this).attr('data-itemId');
        var variation_id = $('#variation_id'+item_id).val();
      
        var product_id = $('#productId'+item_id).val();
        var quantity = $('#qty'+item_id).val();
        var price = $('#price'+item_id).val(); 
        var cart_count = $('#cartCount').val();
        var discount = $('#discount').val();
        var in_stock = $('#in_stock'+item_id).val();
       
        var total = parseFloat(price) * parseFloat(quantity);
        if(sign ==='+'){
        if(quantity > (parseInt(in_stock))){
	           $(".plus"+item_id).prop( "disabled", true );  
	           $('#qty'+item_id).val((parseInt(quantity)-1));
	         	exit();
	     }else{
	            $(".plus"+item_id).prop( "disabled", false );  
	     }
             
        var totalPrice = parseFloat($('#total_price').val()) + (parseFloat(price));

        }else{  
         $(".plus"+item_id).prop( "disabled", false );
        var totalPrice = parseFloat($('#total_price').val()) - (parseFloat(price));   
        }
	     if(totalPrice==0){
	     	exit();
	     } 
	     
          $('#total_price').val(totalPrice);
      

        $('.ItemTotalPrice'+item_id).text( '$'+parseFloat(price) * parseFloat(quantity));
       		var coupon_dis_amt = 0;
        if(discount!=''){
        	
        	 var coupon_dis_amt =  (parseFloat(totalPrice) * (parseFloat(discount)/100));
        }
                     
        var TotalNetPrice = (parseFloat(totalPrice) - parseFloat(coupon_dis_amt) );
      	 $('.discount_amt').text('- $'+coupon_dis_amt+'.00');
        $('.totalPrice').text('$'+totalPrice+'.00');
        $('.netTotalPrice').text('$'+TotalNetPrice+'.00');
         $.ajax({
                method:'post',                       
                url:"{{ route('cart.store') }}",
                data:{quantity:quantity,variation_id:variation_id,product_id:product_id,item_id:item_id,price:price,cart_count:cart_count,is_stock:in_stock,'_token': '{{ csrf_token() }}'},              
                success: function(result){
               
                if(result.in_stock==='OutOfStock'){
                
                	 $('.in_stock'+item_id).text(result.in_stock);
                }else{
                	 $('.in_stock'+item_id).text('In Stock (only '+result.in_stock+' left)');
                	 $('#in_stock'+item_id).val(result.in_stock);
                }
                
                  showNotification();
             $('.success').html('<p><strong>Success!</strong> Item updated successfully</p>');                            
              
                }
            });    
    })
     $(document).on('click','.deleteItem',function(){

         var item_id = $(this).attr('data-item');

          var url = '{{ route("cart.destroy", ":id") }}';
        url = url.replace(':id', item_id); 
        
   
     if (confirm("Are You sure want to delete this product!") == true) {
              $.ajax({
                  url    : url,
                  type   : "delete",  
                  data: {
                    "_token": "{{ csrf_token() }}",
                
                    },             
                  success: function(data) {
                     location.reload();
                  }
              })
          }
     });
     /*Apply Coupon Code*/
	$(document).on('click','.coupon_apply',function(){		
	    var coupon_code = $('#coupon_code').val();
	    var total_price = $('#total_price').val();	  
	    if(coupon_code!=''){	    
	    $.ajax({
                method:'post',                       
                url:"{{ route('cart.coupon-apply') }}",
                data:{coupon_code:coupon_code,'_token': '{{ csrf_token() }}'},              
                success: function(result){ 
                	if(result.discount!=''){
                		var discount_amt =  (parseFloat(total_price) * (parseFloat(result.discount)/100));
                		var net_total =  (parseFloat(total_price) -  parseFloat(discount_amt) )
                		 $('#coupon_id').val(result.coupon_id);
                		 $('#coupon_dis_amt').val(discount_amt);
                		 $('.discount_amt').text('- $'+discount_amt+'.00');
                		 $('.netTotalPrice').text('$'+net_total+'.00');
                		  $('#discount').val(result.discount);
                		  $('.msg').html('<span style="color:green;">'+result.msg+'</span>');	
                		}else{
                		 var discount_amt =  0;
                		var net_total =  (parseFloat(total_price) -  parseFloat(discount_amt) )
                		 $('#coupon_id').val('');
                		 $('#coupon_dis_amt').val(discount_amt);
                		 $('.discount_amt').text('- $'+discount_amt+'.00');
                		 $('.netTotalPrice').text('$'+net_total+'.00');
                		  $('#discount').val(result.discount);
                		  $('.msg').html('<span style="color:red;">'+result.msg+'</span>');	
                		}        
              
                }
            });   
           }else{
                         var discount_amt =  0;
                		var net_total =  (parseFloat(total_price) -  parseFloat(discount_amt) )
                		 $('#coupon_id').val('');
                		 $('#coupon_dis_amt').val(discount_amt);
                		 $('.discount_amt').text('- $'+discount_amt+'.00');
                		 $('.netTotalPrice').text('$'+net_total+'.00');
                		
           	 $('.msg').html('<span style="color:red;">The code field is required.</span>');
           } 
		});  
		$(document).on('keyup','#coupon_code',function(){
		     var total_price = $('#total_price').val();	  
		      var coupon_code = $('#coupon_code').val();
		       if(coupon_code=='')
		       {
		                var discount_amt =  0;
                		var net_total =  (parseFloat(total_price) -  parseFloat(discount_amt) )
                		 $('#coupon_id').val('');
                		 $('#coupon_dis_amt').val(discount_amt);
                		 $('.discount_amt').text('- $'+discount_amt+'.00');
                		 $('.netTotalPrice').text('$'+net_total+'.00');
                		 $('.msg').html('<span style="color:red;">The code field is required.</span>');
		       }else{
		            $('.msg').html('');
		       }
		     
		});
		/*checkout */   
	$(document).on('click','.checkout',function(){
	   var coupon_id = $('#coupon_id').val();
	   var is_stock = $('#is_stock').val();
  		var variation_id = $('#vid').val();
	   var product_id = $('#product_id').val();
	  
    
	 if(is_stock>0){
	 	 $.ajax({
                method:'post',                       
                url:"{{ route('checkout.user-checkout') }}",
                data:{coupon_id:coupon_id,product_id:product_id,variation_id:variation_id,'_token': '{{ csrf_token() }}'},              
                success: function(result){ 
                	  if(result.in_stock =='IsStock'){
                	         	location.replace("{{ route('checkout.index') }}");
                	  }else{
                	         	confirm("Please delete out of stock product!"); 
                	     		location.replace("{{ route('cart.index') }}")
                	  }
              //	location.replace("{{ route('checkout.index') }}");
                }
            });   
	 	}else{

	 		confirm("Please delete out of stock product!");
	 			location.replace("{{ route('cart.index') }}")
	 	}
	   		
	  
	});
 });
</script>
  @endsection
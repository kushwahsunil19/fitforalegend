@extends('layouts.master')
@section('content')
<style>
video{
    /*width:110px !important;*/
    /*height:100px !important;*/
}
.disabled-link {
  pointer-events: none;
}
.icon-star-fill{
    
    margin-right:5px !important;
}
body.equal-height .prd-img:not(.prd-img--noequal) img{
    
   object-fit: contain !important;
}
.slick-track {
    margin: 0;
    touch-action: pan-y;
    -ms-touch-action: pan-y;
}
.prd-block_price {
    display: -ms-flexbox;
    display: flex;
    margin-right: -10px;
    margin-left: -10px;
    -ms-flex-wrap: nowrap;
    flex-wrap: wrap;
}
body.equal-height .prd-img:not(.prd-img--noequal) {
    padding-bottom: 97% !important;
}
 .prd-block .size-list li:hover:not(.absent-option) span.value {
    color: #000;
    background-color: transparent;
}
ul.js-size-list li a:hover{
    
    border: 1px solid #00c7ac;
    color:#00c7ac;
}
ul.js-size-list li a {
    width: auto !important;
    height: auto !important;
    border-radius: 50px !important;
    border: none;
    border: 1px solid #00c7ac;
    min-height:50px;
    min-width:50px;
   
}
.li.active {
    color: #fff !important;
    background: #00c7ac;
    border-radius: 30px;
}
.li.active:hover{
    
    color:#fff !important;
}
/*.prd-block .size-list li span.value {*/
/*    min-width: auto;*/
/*    height: auto;*/
/*    line-height: 50px;*/
/*    border-radius: 50%;*/
/*    cursor: pointer;*/
/*    padding:20px;*/
/*}*/
.prd-block .size-list li.active span.value{
    color: #fff;
    background-color: transparent;
}
.prd-block .size-list li.active span.value:hover{
     color: #fff;
    
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
   
    padding: 10px 15px;
}

.product-previews-carousel.slick-initialized a.active, .product-previews-carousel.slick-initialized a:hover {
    opacity: 1;
}
</style>
<div class="success"> </div>
<div class="page-content">
	<div class="holder breadcrumbs-wrap mt-0">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="{{ route('home.index')}}">Home</a></li>
			<li><a href="{{route('category.index', ['master_id' => $product->masterCategory->id] )}}">{{ $product->masterCategory->master_category_name}}</a></li>
			<li><a href="{{route('category.index', ['master_category_id' => $product->masterCategory->id, 'categoryId' => $product->category->id] )}}">{{ $product->category->category_name}}</a></li>
			<li><a href="{{route('category.index', ['master_category_id' => $product->masterCategory->id, 'category_id' => $product->category->id, 'sub_category_id' =>$product->subCategory->id])}}">{{ $product->subCategory->subcategory_name}}</a></li>
			<li><span>{{ Str::limit($product->product_name, 30, '...') }}</span></li>
		</ul>
	</div>
</div>
	<div class="holder">
	<div class="container js-prd-gallery" id="prdGallery">

		<div class="row prd-block prd-block--prv-bottom">
			<div class="col-md-8 col-lg-8 col-xl-8 aside--sticky js-sticky-collision">
				<div class="aside-content">
<div class="mb-2 js-prd-m-holder"></div>
<div class="prd-block_main-image">
	<div class="prd-block_main-image-holder" id="prdMainImage">
		<div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">
             
			<div data-value="Beige">
				<span class="prd-img">
				<img  src="{{asset('public/uploads/products/')}}/{{$product->image }}" 
				class="lazyload fade-up" alt="" data-zoom-image="{{asset('public/uploads/products/')}}/{{$product->image }}" />
			</span>
			</div>

				@if(isset($product->video_link))
                <div data-value="Beige">
                    <video autoplay controls  muted style="width:100%; ">
                    <source src="{{$product->video_link}}" type="video/mp4">
                    <source src="{{$product->video_link}}" type="video/ogg">
                    </video>
                </div>
	            @endif
            
            @foreach ($product->productImages as $key => $image) 

			<div data-value="Beige"><span class="prd-img">
				<img src="{{asset('public/uploads/products/')}}/{{$image->images }}" 
				class="lazyload fade-up" alt="" data-zoom-image="{{asset('public/uploads/products/')}}/{{$image->images }}"/></span>
			</div>
            @endforeach
			
			
			
		</div>
		@if($product->in_stock>0)
		<div class="prd-block_label-sale-squared justify-content-center align-items-center"><span class="in_stock">@if($product->in_stock>0)In Stock (only {{$product->in_stock}} left) @else Out of stock @endif</span></div>
		@elseif(isset($product->productVariation[0]->in_stock))
		<div class="prd-block_label-sale-squared justify-content-center align-items-center"><span class="in_stock">@if($product->productVariation[0]->in_stock)In Stock (only {{$product->productVariation[0]->in_stock}} left) @else Out of stock @endif</span></div>
		@else
		<div class="prd-block_label-sale-squared justify-content-center align-items-center"><span class="in_stock">@if($product->in_stock>0)In Stock (only {{$product->in_stock}} left) @else Out of stock @endif</span></div>
		@endif
	</div>
</div>
<div class="product-previews-wrapper">
	<div class="product-previews-carousel js-product-previews-carousel">
		<a href="#" data-value="Beige">
			<span class="prd-img">
			<img src="{{asset('public/uploads/products/')}}/{{$product->image }}" data-src="{{asset('public/uploads/products/')}}/{{$product->image }}" class="lazyload fade-up" alt="" style="height:97px;" /></span>
		</a>
			
		@if(isset($product->video_link))
		<a href="#" data-value="Beige">
        <video autoplay controls  muted style="width: 104px;height:97px !important;">
        <source src="{{$product->video_link}}" type="video/mp4">
        <source src="{{$product->video_link}}" type="video/ogg">
        </video>
        </a>
		@endif
          @foreach ($product->productImages as $key => $image) 
		<a href="#" data-value="Beige">
			<span class="prd-img">

			<img src="{{asset('public/uploads/products/')}}/{{$image->images }}" data-src="{{asset('public/uploads/products/')}}/{{$image->images }}" class="lazyload fade-up" alt=""/></span>
		</a>
          @endforeach
		
		
	</div>
</div>
				</div>
			</div>
			<div class="col-md-10 col-lg-10 col-xl-10 mt-1 mt-md-0">
				<div class="prd-block_info prd-block_info--style1" data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
	
	<div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
		<div class="prd-block_price prd-block_price--style2 ">
		    <div class="col-md-18">
             <h3 style="font-size: 19px;font-weight: 400;margin-bottom: 8px;">{{$product->product_name}} </h3>
            </div>
			@if($product->current_price!='')<div class="prd-block_price--actual sizePrice">${{$product->current_price}}</div>
            @endif
			<div class="prd-block_price-old-wrap">
				<!--<h3>{{$product->product_name}} </h3>-->
				@if($product->previous_price!='')<span class="prd-block_price--old" >${{$product->previous_price}}</span>
                @endif
                <?php 
                    $percentage = round( ( $product->previous_price - $product->current_price ) / $product->previous_price * 100 ).'%';
  
                ?>
				<span class="prd-block_price--text saveAmt">You Save: ${{round( $product->previous_price - $product->current_price ) }} ({{$percentage}})</span>
			   <!--<p>@if(isset($product->brand->brand_name)){{ $product->brand->brand_name }}@endif</p>-->
			</div>
		</div>
	</div>
	
	<!--<div class="prd-block_description prd-block_info_item ">
		<h3>Short description </h3>
		<p>{{ $product->short_description }}  </p>
		<div class="mt-1"></div>
	</div>-->
	<div class="order-0 order-md-100">
	<!--	<form method="post" >-->
		
			@if(count($variations))
			<div class="prd-block_options">
				<div class="prd-color swatches">
					
					<div class="option-label">Color:</div>
					<ul class="images-list js-size-list colorli" data-select-id="SingleOptionSelector-0">
                        
                                                   
                          <?php $i = 0;?>
                    		
                          <?php $colors = getSizeWiseColor($product->id, $product->productVariation[0]->size_id);
                          
                         ?>
                            @foreach($colors as  $key => $variation)
                          
                      <li class="@if($i<=0)active @endif" >
                            <a href="" class="color"  data-toggle="tooltip" data-placement="top" data-original-title="{{ $variation->color->color_name}}" style="background:{{ $variation->color->color_code}}; width:50px!important;min-width:50px; height:50px !important;border: 1px solid #bfc0c6 !important;"   data-v_ID="{{ $variation->id}}" data-previous_Price="{{$product->previous_price}}"><span class="image-container image-container--product">{{ $variation->color->color_code}}</span></a>
                            
                               
                        <li>
                        	<?php $i++;?>
                        	@endforeach

					</ul>
					
				</div>
				<div class="prd-size swatches">
                     @if(!empty($variations))
					<div class="option-label">Size:</div>
				
					<ul class="size-list js-size-list" data-select-id="SingleOptionSelector-1">
                       <?php $i = 0;?>
                         @if(!empty($variations))
                       @foreach($variations as  $key => $variation)
                       <li class="@if($i<=0)active  @endif li" ><a class="size"  data-vid="{{ $variation->id}}"    data-previousPrice="{{$product->previous_price}}" ><span class="value">{{ $variation->size->size_name}}</span></a>
                    </li>
                      
                       <?php $i++;?>
                        @endforeach
                        @endif
						
					</ul>
					 @endif
				</div>
			</div>
			@endif
		
			<div class="prd-block_actions prd-block_actions--wishlist">
				<div class="btn-wrap">
                    <input type="hidden" value="{{itemCount()}}" id="cartCount">
                    <?php
                     $in_stock = isset($product->productVariation[0]->in_stock)?$product->productVariation[0]->in_stock:$product->in_stock;
                     $variation_id = isset($product->productVariation[0]->id)?$product->productVariation[0]->id:0;
                      $variation_price = (isset($product->productVariation[0]->price)>0)?$product->productVariation[0]->variation_price:$product->current_price;
					 
                      ?>
                      <input type="hidden" name="" id="is_stock" value="{{  $in_stock}}">
                     <input type="hidden" name="" id="variation_id" value="{{  $variation_id}}">
                     <input type="hidden" name="" id="variation_price" value="{{  $variation_price}}">
                     <input type="hidden" name="" id="product_id" value="{{  $product->id}}">
					<input class="btn btn--add-to-cart btn--sm js-trigger-addtocart js-prd-addtocart addToCartItem" @if($in_stock==0) disabled @endif value="Add to cart" type="submit">
				
				</div>
			</div>
	<!--	</form>-->
	</div>
</div>
			</div>
		</div>
	</div>
</div>
<div class="holder mt-3 mt-md-5">
	<div class="container">
<ul class="nav nav-tabs product-tab">
	<li class="nav-item"><a href="#Tab1" class="nav-link" data-toggle="tab">Description
		<span class="toggle-arrow"><span></span><span></span></span>
	</a></li>
	<li class="nav-item"><a href="#Tab2" class="nav-link" data-toggle="tab">Specification
		<span class="toggle-arrow"><span></span><span></span></span>
	</a></li>
	<li class="nav-item"><a href="#Tab5" class="nav-link" data-toggle="tab">Reviews
		<span class="toggle-arrow"><span></span><span></span></span>
	</a></li>
</ul>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade" id="Tab1">
		<h4 class="mb-15"></h4>
		<div class="row">
			<div class="col-md-18">
				<p>{{ $product->description}}</p>
			</div>
		</div>
		
	</div>
	<div role="tabpanel" class="tab-pane fade" id="Tab2">
		<h3></h3>
		<table class="table table-striped">
            @foreach ($product->productSpecification as $key => $spacification)
			<tr style="display: flex;flex-wrap: wrap;">
				<th scope="row" style="width:100%;">{{$spacification->specification_name}}</th>
				<td>{{ $spacification->specification_description}}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="Tab5">
		<div id="productReviews">
			<div class="row align-items-center">
	<div class="col"><h2>CUSTOMER REVIEWS</h2></div>
	
</div>
<div id="productReviewsBottom">


 @if(!empty($ratings))
	@foreach($ratings as $rating)
	<div class="review-item">
		<div class="review-item_rating d-flex align-items-center">
			     <?php  $count=number_format((float)((float)5 - (float)$rating->user_rating), 1, '.', '');?>
							                   
                    @for($i=0.5;$i < $rating->user_rating; $i++)
                  
                    <i class="icon-star-fill fill margin-right:5px;" ></i>
                     @endfor
                     @if(( $rating->user_rating ==0.5 || $rating->user_rating ==1.5 || $rating->user_rating ==2.5 || $rating->user_rating ==3.5 || $rating->user_rating ==4.5 ))

                    <i class="fa-solid fa-star-half-stroke fill" style="color:#ffd400;margin-right:5px;"></i>
                     @endif
                   @for($i=0.5;$i < $count; $i++)
                   <i class="fa-regular fa-star fill" style="color:#ffd400; margin-right:5px;"></i>
                 @endfor 
		</div>
		<div class="review-item_top row align-items-center">
			<div class="col"><h5 class="review-item_author">{{$rating->user->first_name }} {{$rating->user->last_name }} on {{ date('d,M Y', strtotime($rating->created_at)) }}</h5></div>
			
		</div>
		<div class="review-item_content">
			<h4></h4>
			<p>{{$rating->user_comment}}</p>
		</div>
	</div>
  @endforeach
@endif
</div>
		</div>
	</div>
</div>
	</div>
</div>
	<div class="holder">
	<div class="container">
		<div class="title-wrap text-center">
			<h2 class="h1-style">You may also like</h2>
			<div class="carousel-arrows carousel-arrows--center"></div>
		</div>
		<div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
			 data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
      @foreach($products as $product)   
    <div class="prd prd--style2 prd-labels--max prd-labels-shadow @if(!empty($product->wishlist))
                 <?php  $wishlist = getProductWishlist($product->id); ?>
                 @if(!empty($wishlist) && $wishlist->product_id == $product->id )prd--in-wishlist
                  @endif
                @endif" data-likeStatus{{$product->id}}="1">
    	<div class="prd-inside">
    		<div class="prd-img-area">
    			<a href="{{route('product.show',$product->id)}}" class="prd-img image-hover-scale image-container">
    				<img src="{{asset('public/uploads/products/')}}/{{$product->image }}" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
    				<div class="foxic-loader"></div>
    				<div class="prd-big-squared-labels">
    				</div>
    			</a>
    			<div class="prd-circle-labels">
    				<a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist" data-productId="{{ $product->id}}"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist" data-productId="{{ $product->id}}"><i class="icon-heart-hover"></i></a>
    				
    				<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
    					
    					<ul>
                           @if(!empty($product->ProductImages))
                           @foreach ($product->ProductImages as $key => $image)
    						<li data-image="{{asset('public/uploads/products/')}}/{{$image->images }}"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="{{asset('public/uploads/products/')}}/{{$image->images }}" alt=""></a>
    						</li>
    						@endforeach
                      	    @endif
    						
    					</ul>
    				</div>
    			</div>
    			<ul class="list-options color-swatch">
                   @if(!empty($product->ProductImages))
                           @foreach ($product->ProductImages as $key => $image)
    				<li data-image="{{asset('public/uploads/products/')}}/{{$image->images }}" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" ><img src="{{asset('public/uploads/products/')}}/{{$image->images }}" class="lazyload fade-up" alt="Color Name"></a>
    				</li>
                  @endforeach
                      	    @endif
    						
    				
    			</ul>
    		</div>
    		<div class="prd-info">
    			<div class="prd-info-wrap">
    				<div class="prd-info-top">
    					<div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
    				</div>
    				<div class="prd-rating justify-content-center">
    				 <?php  $data = getUserRatings($product->id);
                                  $count=number_format((float)((float)5 - (float) $data[0]->avg_rating ), 1, '.', '');?>
                                   (@if(!empty($data[0]->avg_rating)){{ $data[0]->avg_rating }} @else 0 @endif)&nbsp;&nbsp;
                                         @for($i=0.5;$i < $data[0]->avg_rating; $i++)                                       
                                         <i class="icon-star-fill fill"></i>
                                          @endfor
                                          @if(( $data[0]->avg_rating ==0.5 || $data[0]->avg_rating ==1.5 || $data[0]->avg_rating ==2.5 || $data[0]->avg_rating ==3.5 || $data[0]->avg_rating ==4.5 ))

                                         <i class="fa-solid fa-star-half-stroke fill" style="color:#ffd400;"></i>
                                          @endif
                                        @for($i=0.5;$i < $count; $i++)
                                   <i class="fa-regular fa-star fill" style="color:#ffd400;"></i>
                                 @endfor </div>
    				<div class="prd-tag"><a href="#">{{$product->brand->brand_name}}</a></div>
    				<h2 class="prd-title"><a href="{{route('product.show',$product->id)}}">{{$product->product_name }}  
                 </a></h2>
    				<div class="prd-description">
    					{{ $product->short_description }} 
    				</div>
    				<div class="prd-action">
    					<form action="#">
    						<button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
    					</form>
    				</div>
    			</div>
    			<div class="prd-hovers">
    				
    				<div class="prd-price">
    					<div class="price-new">$ {{ $product->current_price }}.00</div>
    				</div>
    				<!-- <div class="prd-action">
    					<div class="prd-action-left">
    						<form action="{{route('product.show',$product->id);}}">
    							<button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
    						</form>
    					</div>
    				</div> -->
    			</div>
    		</div>
    	</div>
    </div>
      @endforeach

		</div>
	</div>
</div>
</div>

<div id="sizeGuide" style="display: none;" class="modal-info-content modal-info-content-lg">
	<div class="modal-info-heading">
		<h4 style="font-size: 25px; margin-bottom: 30px;"> Riview Rating </h4>
	</div>
	<div class="modal-info-body">
	    <div class="form-group" style="border: none">
	        <label> Rating </label>
	        <div class="wrapper">
                <input type="checkbox" id="st1" value="1" />
                <label for="st1"></label>
                <input type="checkbox" id="st2" value="2" />
                <label for="st2"></label>
                <input type="checkbox" id="st3" value="3" />
                <label for="st3"></label>
                <input type="checkbox" id="st4" value="4" />
                <label for="st4"></label>
                <input type="checkbox" id="st5" value="5" />
                <label for="st5"></label>
            </div>
	    </div>
	</div>
</div>

<style>
.fancybox-content{
    background: #fff !important;
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){

 $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
 
     $(document).on('click','.size',function(){   
      var vid = $(this).attr("data-vid");
       $('#variation_id').val(vid);
      var previousPrice = $(this).attr("data-previousPrice");
    
         $.ajax({
                url :"{{ route('check-stock') }}",
                type : "post",
                data :{'vid':vid,"_token": "{{ csrf_token() }}"},
           success: function(result) {             
             if(result.in_stock==='OutOfStock'){
                 	$('.addToCartItem').attr('disabled', 'disabled' );
                	 $('.in_stock').text('Out of stock');
                	  $('.colorli').html(result.colorhtml);
                	   $('#variation_price').val(result.variation_price);
                	 	$('.sizePrice').text('$'+result.variation_price);
                	 	
       			var percent =  ( parseFloat(previousPrice) - parseFloat(size_price) ) / parseFloat(previousPrice) * 100 ;
			      var saveAmt = 'You Save: $'+ ( previousPrice - size_price ) +' ('+ Math.round(percent) +'%)';
			         $('.saveAmt').text(saveAmt);
                }else{
                     $('.addToCartItem').removeAttr("disabled");
                    
                	 $('.colorli').html(result.colorhtml);
                	 $('.in_stock').text('In Stock (only '+result.in_stock+' left)');
                	  $('#variation_price').val(result.variation_price);
                	  $('.sizePrice').text('$'+result.variation_price);
                	var variation_price= result.variation_price
                var percent =  ( parseFloat(previousPrice) - parseFloat(variation_price) ) / parseFloat(previousPrice) * 100 ;
			      var saveAmt = 'You Save: $'+ ( previousPrice - variation_price ) +' ('+ Math.round(percent) +'%)';
			         $('.saveAmt').text(saveAmt);
                	
                }
           }
         });
    });
$(document).on('click','.color',function(){ 
    $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
      var vid = $(this).attr("data-v_ID");
       $('#variation_id').val(vid);
      var previousPrice = $(this).attr("data-previous_Price");

      $.ajax({
                url :"{{ route('check-stock') }}",
                type : "post",
                data :{'vid':vid,"_token": "{{ csrf_token() }}"},
           success: function(result) {             
             if(result.in_stock==='OutOfStock'){
                	 $('.in_stock').text('Out of stock');
                	  $('.colorli').html(result.colorhtml);
                	 
            	 	 $('#variation_price').val(result.variation_price);
  					 $('.sizePrice').text('$'+result.variation_price);
					var variation_price = result.variation_price;
					var percent =  ( parseFloat(previousPrice) - parseFloat(variation_price) ) / parseFloat(previousPrice) * 100 ;
					var saveAmt = 'You Save: $'+ ( previousPrice - variation_price ) +' ('+ Math.round(percent) +'%)';
					
					$('.saveAmt').text(saveAmt);
					$('.addToCartItem').attr('disabled', 'disabled' );
                }else{
                   $('.addToCartItem').removeAttr("disabled");
                	 $('.colorli').html(result.colorhtml);
                	 $('.in_stock').text('In Stock (only '+result.in_stock+' left)');
                		
      					 $('.sizePrice').text('$'+result.variation_price);
						var variation_price = result.variation_price;
						 $('#variation_price').val(result.variation_price);
						var percent =  ( parseFloat(previousPrice) - parseFloat(variation_price) ) / parseFloat(previousPrice) * 100 ;
						var saveAmt = 'You Save: $'+ ( previousPrice - variation_price ) +' ('+ Math.round(percent) +'%)';
						$('.saveAmt').text(saveAmt);
						
                	
                }
           }
         });
    });
   
    $(document).on('click','.addToCartItem',function(e){
        e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

            var variation_id =$('#variation_id').val();
            var is_stock =$('#is_stock').val();
            var product_id = $('#product_id').val();
            var variation_price = $('#variation_price').val();
            var quantity = 1;
            var cart_count = $('#cartCount').val();
                   
         $.ajax({
                url :"{{ route('cart.store') }}",
                type : "post",
                data :{'product_id':product_id,'variation_id':variation_id,'variation_price':variation_price,'quantity':quantity,'cart_count':cart_count,'is_stock':is_stock,"_token": "{{ csrf_token() }}"},
           success: function(data) {             
             $('.cartCount').text(data.cart_count); 
              $('#cartCount').val(data.cart_count);    
              if(data.Is_login=='Not'){
                    location.replace("{{ route('login.index') }}");
              }else if(data.in_stock==='OutOfStock'){
               	confirm("This is product out of stock!");
	 		        location.reload();
              }else{
                  	 $('.addToCartItem').removeAttr("disabled");
                   showNotification();
                $('.success').html('<p><strong>Success!</strong> Item Added successfully</p>')   
              }
          
            
           }
         });
   });
      /* add to product wishlist */
       $(document).on('click','.circle-label-compare',function(){
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
          var product_id = $(this).attr('data-productId');

          var likeStatus = $('.hovered.prd--in-wishlist').attr('data-likeStatus'+product_id);               
           if (likeStatus == undefined) {
             var likeStatus = 0;
           }


         $.ajax({
               url    :"{{ route('account-wishlist.store') }}",
               type   : "post",
               data   :{'product_id':product_id,'likeStatus':likeStatus,'_token': '{{ csrf_token() }}'},
   
               success: function(data) {   
                  if(data.Is_login=='Not'){
                    location.replace("{{ route('login.index') }}");
                    }
               }

              })
        
       });
});
</script>
  @endsection

@extends('layouts.master')
@section('content')
<style>
ul.two-column{
    column-count: auto !important;
}
.prd-img-area a img {
    object-fit: contain !important;
    width: 100% !important;
}
   .sidebar-block ul.color-list li a span.colorname{
   padding-left: 30px;
   }
   input[type='checkbox'], input[type='radio'] {
   display: block;
   position: absolute;
   left: 0;
   top: 8px;
   }
   .sidebar-block ul.category-list li a:after, .sidebar-block ul.category-list li a:before{
   display: none;
   }
   .prd:not([class*='prd-w']), .prd-hor:not([class*='prd-w']), .prd-promo:not([class*='prd-w']) {
   opacity: 1;
   }
   .ulist{
       position:relative;
   }
   .ulist-drop{
       postion:absolute;
       left:0;
       display:none;
       
   }
   .dropdown {
  margin: 0;
  /*padding: 0;*/
  list-style: none;
  width: 100px;
  background-color: #f7f7f8;
  border: 1px solid #ededed !important;
  border-radius: 3px !important;
  padding: 5px 44px 5px 14px;
  cursor: pointer;
  margin-right: 8px;
}

.dropdown li {
  position: relative;
}

.dropdown li a {
  color: #ffffff;
  text-align: center;
  text-decoration: none;
  display: block;
  padding: 10px;
}

.dropdown li ul {
  position: absolute;
  top: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
  display: none;
  line-height: normal;
  background-color: #fff;
      z-index: 999999;
      border: 1px solid #ededed;
}

    .dropdown li ul li a {
     text-align: left;
    color: #000;
    font-size: 14px;
    padding: 7px 40px;
    display: block;
    white-space: nowrap;
    width: 100%;
        border-bottom: 1px solid #ededed;
    }
    
    .dropdown li ul li a:hover {
          background-color: #17c6aa;
    color: #fff !important;
    /*border: 1px solid #ededed;*/
   
    }
    
    .dropdown li ul li ul {
      left: 100%;
      top: 0;
    }
  
    
    ul li:hover >ul {
      display: block;
    }
    
    
    .prd .prd-inside {
    overflow: hidden;
    background-color: #fff;
    border: 1px solid #ededed;
    height: 400px;
    padding: 0px 11px;
    border-radius: 5px;
}
.price-range-slider {
  width: 100%;
  /*float: left;*/
  padding: 10px 20px;
}
.price-range-slider .range-value {
  margin: 0;
}
.price-range-slider .range-value input {
  width: 100%;
  background: none;
  color: #13cbb2;
  font-size: 16px;
  font-weight: initial;
  box-shadow: none;
  border: none;
  margin: 20px 0 20px 0;
}
.price-range-slider .range-bar {
  border: none;
  background: #c5c5c5;
  height: 3px;
  width: 96%;
  margin-left: 8px;
}
.price-range-slider .range-bar .ui-slider-range {
  background: #13cbb2;
  border: 1px solid #13cbb2;
}
.price-range-slider .range-bar .ui-slider-handle {
  border: none;
  border-radius: 25px;
  background: #13cbb2;
  border: 2px solid #13cbb2;
  height: 17px;
  width: 17px;
  top: -0.52em;
  cursor: pointer;
}
.price-range-slider .range-bar .ui-slider-handle + span {
  background: #13cbb2;
}
.ui-widget.ui-widget-content {
    border: 1px solid transparent !important;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, 
.ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:focus {
    border: 1px solid #00ccb4;
    background: #f6f6f6;
    font-weight: normal;
    color: #fff !important;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, 
.ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    border: 1px solid #00ccb4 !important ;
    background: #f6f6f6;
    font-weight: normal;
    color: #fff !important;
}
.ui-slider-handle{
        box-shadow: none !important;
    outline: none !important;
}
/*--- /.price-range-slider ---*/


/*--- /.price-range-slider ---*/
</style>

<div class="page-content">
   <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
         <ul class="breadcrumbs">
            <li><a href="{{ route('home.index')}}">Home</a></li>
            <li><span>Category</span></li>
            <!--<li class="d-block mt-2 page-title2">Men's Jeckets<span> - 125 items</span></li>-->
         </ul>
         <!-- <div class="page-title text-center">
            <h1>WOMEN’S</h1>
            </div> -->
      </div>
   </div>
   <div class="holder">
      <div class="container">
         <div class="">
            <div class="row">
               <div class="col-md-10 p-1">
                  <li class="d-block mt-2 page-title2"><span>  </span></li>
               </div>
               <div class="col-md-8 p-1 d-flex justify-content-end">
                  <div class="select-wrap d-none d-md-flex">
                     <div class="select-label">SORT:</div>
                     <div class="select-wrapper select-wrapper-xxs">
                        <!--<select class="form-control input-sm">-->
                        <!--   <option value="rating">Rating</option>-->
                        <!--   <option value="price">Price</option>-->
                        <!--</select>-->
                          <ul class="dropdown">
                                <li>
                                   Rating 
                                    <ul>
                                        
                                        <li>
                                            <a href="#">Rating</a>
                                            <ul>
                                                <li><a class="ratingFilter" data-RatingFilter="Hig to Low">Hig to Low</a></li>
                                                <li><a class="ratingFilter" data-RatingFilter="Low To High">Low To High</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Price</a>
                                            <ul>
                                                <li ><a class="priceFilter" data-PriceFilter="Hig to Low">Hig to Low</a></li >
                                                <li><a class="priceFilter" data-PriceFilter="Low To High">Low To High</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <!--<ul class="ulist">-->
                        <!--    <li>Rating-->
                        <!--    <ul class="ulist-drop">-->
                        <!--        <li>low to High</li>-->
                        <!--    </ul>-->
                            
                        <!--    </li>-->
                        <!--</ul>-->
                     </div>
                  </div>
                  <div class="select-wrap d-none d-md-flex">
                     <div class="select-label">VIEW:</div>
                     <div class="select-wrapper select-wrapper-xxs">
                        <select class="form-control input-sm" id="viewLimit">
                           <option value="25">25</option>
                           <option value="50">50</option>
                           <option value="80">80</option>
                           <option value="100">100</option>
                           <option value="150">150</option>
                           <option value="200">200</option>
                           <option value="All">All</option>
                        </select>
                     </div>
                  </div>
                  <div class="viewmode-wrap d-flex align-items-center">
                     <div class="view-mode">
                        <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                        <span class="js-gridview"><i class="icon-grid"></i></span>
                        <span class="js-listview"><i class="icon-list"></i></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
               <div class="filter-col-content filter-mobile-content">
                  <div class="sidebar-block d-filter-mobile">
                     <h3 class="mb-1">SORT BY</h3>
                     <div class="select-wrapper select-wrapper-xs">
                        <select class="form-control">
                           <option value="featured">Featured</option>
                           <option value="rating">Rating</option>
                           <option value="price">Price</option>
                        </select>
                     </div>
                  </div>
                  <div class="sidebar-block filter-group-block open">
                     <div class="sidebar-block_title">
                        <span>Master Categories</span>
                        <span class="toggle-arrow"><span></span><span></span></span>
                     </div>
                     <div class="sidebar-block_content">
                        <ul class="category-list">
                            <?php $masterCategoryAccessary = 0;?>
                           @foreach($masterCategories as $masterCategory)
                           <?php 
                           if('Accessories'==$masterCategory->master_category_name){
                                $masterCategoryAccessary = $masterCategory->id; 
                           }

                           ?>
                           <li><a href="#" ><input id="{{ $masterCategory->id}}" type="radio" name="master_category_id" class="master_id" data-accessary="{{$masterCategoryAccessary}}" value="{{ $masterCategory->id }}" @if($masterCategory->id==$master_category_id || $masterCategory->id == $master_id) checked @endif ><label for="{{ $masterCategory->id}}">{{ $masterCategory->master_category_name }}</label></a></li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  
                     <div class="sidebar-block filter-group-block open filterByMasterCategorty">
                        <div class="sidebar-block_title">
                           <span>Categories</span>
                           <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="sidebar-block_content">
                           <ul class="category-list custom_checkbox">
                             
                              @foreach($categories as $category)
                              @if($master_category_id ==$category->master_category_id || $category->master_category_id == $master_id  )
                              <li>
                                 <p  title="Casual" class="open cat-heading">{{$category->category_name}}</span></p>
                                 <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                                 <ul class="category-list two-column cat-list" >
                                    
                                    @foreach($subcategories as $key => $subcategory)
                                    @if($subcategory->category->id ==$category->id)
                                    <li class="@if($subcategory->id==$sub_category_id) active @endif"><a href="javascript:;"  class="open "  data-sub-id="{{ $subcategory->id }}" > <input id="mascategory{{$key}}" type="checkbox" class="sub_category_id" name="sub_category_id" value="{{ $subcategory->id }}"  @if($subcategory->id==$sub_category_id || request()->query('categoryId')==$category->id || $categoryId==$category->id || $category->master_category_id == $master_id) checked @endif > <label for="mascategory{{$key}}"> {{ $subcategory->subcategory_name }}  </label> </a></li>
                                  
                                    @endif
                                    @endforeach
                                  
                                    <!--   <li><a href="javascript:;" title="Women" class="open">Women's jeckets</a></li>
                                       <li><a href="javascript:;" title="Accessories" class="open">Kids's jeckets</a></li>  -->
                                 </ul>
                              </li>
                               
                              @endif
                              @endforeach
                             
                               
                           </ul>
                        </div>
                     </div>

                  @if(app('request')->input('master_category_id')!=$masterCategoryAccessary) 
                  <!-- accessaries = 3 -->
                  <div class="sidebar-block filter-group-block collapsed color">
                     <div class="sidebar-block_title">
                        <span>Colors</span>
                        <span class="toggle-arrow"><span></span><span></span></span>
                     </div>
                     <div class="sidebar-block_content">
                        <ul class="category-list two-column custom_checkbox">
                           @foreach($colors as $key=> $color)
                           <li><a href="#"><input id="color{{$key}}" type="checkbox"  name="color_id"  value="{{ $color->id }}"><label for="color{{$key}}">{{ $color->color_name }}</label></a></li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="sidebar-block filter-group-block collapsed size">
                     <div class="sidebar-block_title">
                        <span>Size</span>
                        <span class="toggle-arrow"><span></span><span></span></span>
                     </div>
                     <div class="sidebar-block_content">
                        <ul class="category-list two-column size-list custom_checkbox" data-sort='["XXS","XS","S","M","L","XL","XXL","XXXL"]'>
                            @foreach($sizes as $key=> $size)
                               <li ><a href="#"><input id="size{{$key}}" type="checkbox"  data-value="{{$size->size_name }}" name="size_id"  value="{{$size->id }}"> <label for="size{{$key}}"> {{$size->size_name }} </label> </a></li>
                            @endforeach  
                         
                        </ul>
                     </div>
                  </div>
                  @endif
                  <div class="sidebar-block filter-group-block collapsed ">
                     <div class="sidebar-block_title">
                        <span>Brands</span>
                        <span class="toggle-arrow"><span></span><span></span></span>
                     </div>
                     <div class="sidebar-block_content">
                        <ul class="category-list two-column custom_checkbox">
                            @if(!empty($brands))
                           @foreach($brands as $key=> $brand)
                           <li><a href="#"><input id="brand{{$key}}" type="checkbox" name="brand_id" value="{{ $brand->id }}"><label for="brand{{$key}}"> {{ $brand->brand_name }}</label></a></li>
                           @endforeach
                           @endif
                        </ul>
                     </div>
                  </div>
                  <div class="sidebar-block filter-group-block collapsed">
                     <div class="sidebar-block_title">
                        <span>Price</span>
                        <span class="toggle-arrow"><span></span><span></span></span>
                     </div>
                     <div class="sidebar-block_content">
                     <div class="price-range-slider">
                      
                      <p class="range-value">
                        <input type="text" id="amount" readonly>
                        <input type="hidden" id="min_price" value="" >
                        <input type="hidden" id="max_price" value="">
                        
                      </p>
                      <div id="slider-range" class="range-bar"></div>
                      
                    </div>
                     </div>
                  </div>
                  <!-- <div class="sidebar-block filter-group-block collapsed">
                     <div class="sidebar-block_title">
                         <span>Popular tags</span>
                         <span class="toggle-arrow"><span></span><span></span></span>
                     </div>
                     <div class="sidebar-block_content">
                         <ul class="tags-list">
                             <li class="active"><a href="#">Jeans</a></li>
                             <li><a href="javascript:;">St.Valentine’s gift</a></li>
                             <li><a href="javascript:;">Sunglasses</a></li>
                             <li><a href="javascript:;">Discount</a></li>
                             <li><a href="javascript:;">Maxi dress</a></li>
                         </ul>
                     </div>
                     </div> -->
               </div>
            </div>
            <div class="filter-toggle js-filter-toggle">
               <div class="loader-horizontal js-loader-horizontal">
                  <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                  </div>
               </div>
               <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i class="icon-filter-close"></i></span>
               <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">REFINE & SORT</a><a href="#" class="filter-btn-close js-filter-btn">RESET</a><a href="#" class="filter-btn-apply js-filter-btn">APPLY & CLOSE</a></span>
            </div>
            <div class="col-lg aside">
               <div class="prd-grid-wrap">
                  <div class="filterData">
                      <?php  $user_id = (isset(auth()->user()->id))?auth()->user()->id:''; ?>
                     <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content="">
                        @foreach($products as $product)  
                        <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg @if(isset($product->wishlist->product_id)==$product->id && $user_id == $product->wishlist->user_id ) prd--in-wishlist @endif" data-likeStatus{{$product->id}}="1">
                           <div class="prd-inside">
                              <div class="prd-img-area">
                                 <a href="{{route('product.show',$product->id)}}" class="prd-img image-hover-scale image-container">
                                    <img src="{{asset('public/uploads/products/')}}/{{$product->image }}" data-src="{{asset('public/uploads/products/')}}/{{$product->image }}" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">
                                    <div class="foxic-loader"></div>
                                    <div class="prd-big-squared-labels">
                                       <!-- <div class="label-new"><span>New</span></div> -->
                                       <div class="label-sale">
                                          <span> {{ 
                                          $percentage = round( ( $product->previous_price - $product->current_price ) / $product->previous_price * 100 ).'%';
                                          }}<span class="sale-text">Sale</span></span>
                                          <div class="countdown-circle">
                                          </div>
                                       </div>
                                    </div>
                                 </a>
                                 <div class="prd-circle-labels"> 
                                    <a href="#" class="  circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist" data-productId="{{ $product->id}}" ><i class="icon-heart-stroke" ></i></a>
                                    <a href="#" class="  circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist" data-productId="{{ $product->id}}"><i class="icon-heart-hover"></i></a> 
                                 </div>
                                 <ul class="list-options color-swatch">
                                     @if(!empty($product->ProductImages))
                                @foreach ($product->ProductImages as $key => $image)
                                    <li data-image="{{asset('public/uploads/products/')}}/{{$image->images }}" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" >
                                       <img src="{{asset('public/uploads/products/')}}/{{$image->images }}" data-src="{{asset('public/uploads/products/')}}/{{$image->images }}" class="lazyload fade-up" alt="Color Name"></a>
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
                                 @endfor 
                                    </div>
                                    <div class="prd-tag"><a href="#">{{$product->brand->brand_name}}</a></div>
                                    <h2 class="prd-title"><a href="{{route('product.show',$product->id)}}">{{$product->product_name }} </a></h2>
                                    <div class="prd-description"> {{ $product->short_description }} </div>
                                    <div class="prd-action">
                                       <!--<form action="{{route('product.show',$product->id);}}"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
                                    </div>
                                 </div>
                                 <div class="prd-hovers">
                                    <div class="prd-circle-labels">
                                       <div>
                                          <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist" data-productId="{{ $product->id}}" data-like="1"><i class="icon-heart-stroke"></i></a>
                                          <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist" data-productId="{{ $product->id}}" data-like="0"><i class="icon-heart-hover"></i></a>
                                       </div>
                                       <!--<div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
                                    </div>
                                    <div class="prd-price">
                                       <div class="price-new">$ {{ $product->current_price}}</div>
                                       <div class="price-old">$ {{ $product->previous_price}}</div>
                                    </div>
                                    <!-- <div class="prd-action">
                                       <div class="prd-action-left">
                                          <form action="{{route('product.show',$product->id)}}"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>
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
         </div>
      </div>
   </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
       
       
     
    $(document).on('change','.sidebar-block ul.category-list',function(){
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
            var master_category_id ='';
            var sub_cat_id ='';
            var brand_id ='';
            var color_id ='';
            var size_id ='';
            var min_price ='';   
            var max_price = '';
            var priceFilter = '';
            var ratingFilter = '';
            var viewLimit =''; 
     
       master_category_id = $('input[name="master_category_id"]:checked').val();
     
       sub_cat_id=$('.category-list  input[name="sub_category_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');
     
      
         brand_id =$('.category-list  input[name="brand_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');     
        color_id =$('.category-list  input[name="color_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');  
        size_id =$('.category-list  input[name="size_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(','); 
       filterDatas(master_category_id,sub_cat_id,brand_id,color_id,size_id,min_price,max_price,priceFilter,ratingFilter,viewLimit);
    });
$(function() {
	$( "#slider-range" ).slider({
	  range: true,
	  min: {{$minPrice}},
	  max: {{$maxPrice}},
	  values: [ 0, 10000 ],
	  slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#min_price" ).val(ui.values[ 0 ]);
		$( "#max_price" ).val( ui.values[ 1 ]);
		setdatga()
	  }
	  
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	  $( "#min_price" ).val($( "#slider-range" ).slider( "values", 0 ));
	  $( "#max_price" ).val( $( "#slider-range" ).slider( "values", 1 ));
});




      function setdatga(){
            var master_category_id ='';
            var sub_cat_id ='';
            var brand_id ='';
            var color_id ='';
            var size_id ='';
            var min_price ='';   
            var max_price = '';
            var priceFilter = '';
            var ratingFilter = '';
            var viewLimit =''; 
        	var min_price = $( "#min_price" ).val();
    		var max_price = $( "#max_price" ).val();
    	
          master_category_id = $('input[name="master_category_id"]:checked').val();
       sub_cat_id=$('.category-list  input[name="sub_category_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');
     
      
         brand_id =$('.category-list  input[name="brand_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');     
        color_id =$('.category-list  input[name="color_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');  
        size_id =$('.category-list  input[name="size_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(','); 
     
       var priceFilter = $(this).attr('data-PriceFilter');
           
       filterDatas(master_category_id,sub_cat_id,brand_id,color_id,size_id,min_price,max_price,priceFilter,ratingFilter,viewLimit);
       
       
};

    $(document).on('click','.priceFilter',function(){
         var master_category_id ='';
            var sub_cat_id ='';
            var brand_id ='';
            var color_id ='';
            var size_id ='';
            var min_price ='';   
            var max_price = '';
            var priceFilter = '';
            var ratingFilter = '';
            var viewLimit =''; 
       master_category_id = $('input[name="master_category_id"]:checked').val();
     
       sub_cat_id=$('.category-list  input[name="sub_category_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');
     
      
         brand_id =$('.category-list  input[name="brand_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');     
        color_id =$('.category-list  input[name="color_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');  
        size_id =$('.category-list  input[name="size_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(','); 
     
        var priceFilter = $(this).attr('data-PriceFilter');
           
       filterDatas(master_category_id,sub_cat_id,brand_id,color_id,size_id,min_price,max_price,priceFilter,ratingFilter,viewLimit);
       
       
    });
      $(document).on('click','.ratingFilter',function(){
            var master_category_id ='';
            var sub_cat_id ='';
            var brand_id ='';
            var color_id ='';
            var size_id ='';
            var min_price ='';   
            var max_price = '';
            var priceFilter = '';
            var ratingFilter = '';
            var viewLimit =''; 
     
       master_category_id = $('input[name="master_category_id"]:checked').val();
     
       sub_cat_id=$('.category-list  input[name="sub_category_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');
     
      
         brand_id =$('.category-list  input[name="brand_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');     
        color_id =$('.category-list  input[name="color_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');  
        size_id =$('.category-list  input[name="size_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(','); 
        var ratingFilter = $(this).attr('data-RatingFilter');
       filterDatas(master_category_id,sub_cat_id,brand_id,color_id,size_id,min_price,max_price,priceFilter,ratingFilter,viewLimit);
       
       
    });
    
    $('#viewLimit').change(function(){
    
    var master_category_id ='';
            var sub_cat_id ='';
            var brand_id ='';
            var color_id ='';
            var size_id ='';
            var min_price ='';   
            var max_price = '';
            var priceFilter = '';
            var ratingFilter = '';
            var viewLimit =''; 
     
       master_category_id = $('input[name="master_category_id"]:checked').val();
     
       sub_cat_id=$('.category-list  input[name="sub_category_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');
     
      
         brand_id =$('.category-list  input[name="brand_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');     
        color_id =$('.category-list  input[name="color_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');  
        size_id =$('.category-list  input[name="size_id"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(','); 
        var ratingFilter = $(this).attr('data-RatingFilter');
        var viewLimit = $('#viewLimit :selected').val();
       filterDatas(master_category_id,sub_cat_id,brand_id,color_id,size_id,min_price,max_price,priceFilter,ratingFilter,viewLimit);
    });
         $(document).on('click','.js-horview',function(){
            var viewDestin = 'off-animation js-horview';
            $('.js-category-grid').addClass('off-animation js-horview prd-horgrid');
            $('.js-category-grid').addClass('prd-horgrid');
            $('.js-category-grid').removeClass('prd-listview');
            $('.js-category-grid').removeClass('prd-grid');
            $('.js-category-grid').removeClass('js-listview');
            $('.js-category-grid').removeClass('js-gridview');
         });
         $(document).on('click','.js-gridview',function(){
             var viewDestin = 'off-animation js-gridview';
            $('.js-category-grid').addClass('off-animation js-gridview');
            $('.js-category-grid').addClass('prd-grid');
            $('.js-category-grid').removeClass('prd-horgrid');
            $('.js-category-grid').removeClass('prd-listview');
            $('.js-category-grid').removeClass('js-listview');
            $('.js-category-grid').removeClass('js-horview');
             
         });
         $(document).on('click','.js-listview',function(){
            var viewDestin = 'off-animation prd-listview';
            $('.js-category-grid').addClass('off-animation js-listview');
            $('.js-category-grid').addClass('prd-listview');
            $('.js-category-grid').removeClass('prd-horgrid');
            $('.js-category-grid').removeClass('prd-grid');
            $('.js-category-grid').removeClass('js-gridview');
            $('.js-category-grid').removeClass('js-horview');
            
         });
    
    function filterDatas(master_category_id,sub_cat_id,brand_id,color_id,size_id,min_price,max_price,priceFilter,ratingFilter,viewLimit) {
             
     $.ajax({
           url    :"{{ route('category.filter') }}",
           type   : "post",
           data   :{'master_category_id':master_category_id,'sub_category_id':sub_cat_id,'brand_id':brand_id,'color_id':color_id,'size_id':size_id,'min_price':min_price,'priceFilter':priceFilter,'ratingFilter':ratingFilter,'viewLimit':viewLimit,'max_price':max_price,"_token": "{{ csrf_token() }}"},
   
           success: function(data) {
   
               $('.filterData').html( data );
                $('.js-category-grid').addClass('off-animation js-gridview');
                $('.js-category-grid').addClass('prd-grid');
                $('.js-gridview').addClass('active');
                $('.js-listview').removeClass('active');
                $('.js-horview').removeClass('active');
                $('.js-category-grid').removeClass('prd-horgrid');
                $('.js-category-grid').removeClass('prd-listview');
                $('.js-category-grid').removeClass('js-listview');
                $('.js-category-grid').removeClass('js-horview');
           }
       })
  
}  
      /*Master category wise diplay categoy*/
       $(".master_id").change(function(){ // bind a function to the change event
         
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         if( $(this).is(":checked") ){ // check if the radio is 
             var master_category_id = $(this).val(); // retrieve
             var accessary = $(this).attr('data-accessary');
         
             
              if(master_category_id ==accessary){
                  $(".color").hide();
                  $(".size").hide();
                
                }else{
                  $(".color").show();
                  $(".size").show();
                }
              $.ajax({
               url    :"{{ route('category.filterByMastercategory') }}",
               type   : "post",
               data   :{'master_category_id':master_category_id,"_token": "{{ csrf_token() }}"},
   
               success: function(data) {
   
                   $('.filterByMasterCategorty').html( data );
               }
              })
         }
     });

  
       /* add to product wishlist */
       $(document).on('click','.circle-label-compare',function(){
          
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
          var product_id = $(this).attr('data-productId'); 
          var like = $(this).attr('data-like'); 
         
          var likeStatus = $('.hovered.prd--in-wishlist').attr('data-likeStatus'+product_id); 
          
           if (likeStatus == undefined) {
             var likeStatus = 0;
             if(like){
                   var likeStatus =like;
              } 
           } 
          
        
         $.ajax({
               url    :"{{ route('account-wishlist.store') }}",
               type   : "post",
               data   :{'product_id':product_id,'likeStatus':likeStatus,'_token': '{{ csrf_token() }}'},
   
               success: function(data) {
   
                  
               }
              })
        
       });
       
   });

</script>


@endsection
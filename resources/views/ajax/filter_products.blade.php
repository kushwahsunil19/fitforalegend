<div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content="">
   <?php  $user_id = (isset(auth()->user()->id))?auth()->user()->id:''; ?>
   @foreach($products as $product)  
   <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg @if(isset($product->wishlist->product_id)==$product->id && $user_id == $product->wishlist->user_id ) prd--in-wishlist @endif" data-likeStatus{{$product->id}}="1" >
   <div class="prd-inside">
      <div class="prd-img-area">
         <a href="{{route('product.show',$product->id)}}" class="prd-img image-hover-scale image-container">
            <img src="{{asset('public/uploads/products/')}}/{{$product->image }}" data-src="{{asset('public/uploads/products/')}}/{{$product->image }}" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">
            <div class="foxic-loader"></div>
            <div class="prd-big-squared-labels">
               <!-- <div class="label-new"><span>New</span></div> -->
               <div class="label-sale">
                  <span>{{ 
                  $percentage = round( ( $product->previous_price - $product->current_price ) / $product->previous_price * 100 ).'%';
                  }} <span class="sale-text">Sale</span></span>
                  <div class="countdown-circle">
                  </div>
               </div>
            </div>
         </a>
         <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist" data-productId="{{ $product->id}}">
            <i class="icon-heart-stroke"></i>
            </a>
            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist" data-productId="{{ $product->id}}"><i class="icon-heart-hover"></i>
            </a> 
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
            <div class="prd-rating justify-content-center">  <?php  $data = getUserRatings($product->id);
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
            <h2 class="prd-title"><a href="{{route('product.show',$product->id)}}">{{$product->product_name }}</a></h2>
            <div class="prd-description"> {{ $product->short_description }} </div>
            <div class="prd-action">
              <!-- <form action="{{route('product.show',$product->id);}}"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
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
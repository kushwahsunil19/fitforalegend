@extends('layouts.master')
@section('content')

<style>
.prd .prd-inside {
    overflow: hidden;
    background-color: #fff;
    border: 1px solid #ededed;
    padding: 0px 11px;
    border-radius: 5px;
}.prd-img2 img {
    height: 100% !important; padding: 11px;
}
</style>

<div class="page-content page-content2">
  <div class="holder breadcrumbs-wrap mt-0">
  <div class="container">
    <ul class="breadcrumbs">
      <li><a href="{{ route('home.index')}}">Home</a></li>
      <li><span>My Wishlist</span></li>
    </ul>
  </div>
</div>
  <div class="holder">
  <div class="container">
    <div class="row">
        @include('layouts.userAccountSidebar')
      
      <div class="col-md-14 aside">
            <div class="card card2">
              <div class="card-body card-body2">
        <h1 class="mb-2 w-l">My Wishlist</h1>
        <div class="empty-wishlist js-empty-wishlist text-center py-3 py-sm-5 d-none" style="opacity: 0;">
          <h3>Your Wishlist is empty</h3>
          <div class="mt-5">
            <a href="{{ route('home.index')}}" class="btn">Continue shopping</a>
          </div>
        </div>
<div class="prd-grid-wrap">
    <div class="product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid prd-listview product-listing2" data-grid-tab-content="">
        @if(!empty($wishlists ))
        @foreach($wishlists as $wishlist)
      <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">
          <div class="prd-inside">
              <div class="prd-img-area"> 
              <a href="{{route('product.show',$wishlist->product->id)}}" class="prd-img image-hover-scale image-container prd-img2"> 
                <img src="{{asset('public/uploads/products/')}}/{{$wishlist->product->image }}" 
                data-src="{{asset('public/uploads/products/')}}/{{$wishlist->product->image }}" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">
                      <div class="foxic-loader"></div>
                  </a>
                  <div class="prd-circle-labels"> 
                  <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                  <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> 
              </div>
              </div>
              <div class="prd-info">
                  <div class="prd-info-wrap">
                      <div class="prd-info-top">
                      </div>
                    
                      <h3 class="prd-title prd-ttl"><a href="{{route('product.show',$wishlist->product->id)}}">{{$wishlist->product->product_name }}</a></h3>
                          <div class="prd-rating prd-rtn">
                            
                            <?php  $data = getUserRatings($wishlist->product->id);
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
                      <h2 class="prd-title price-old"><a href="javascript:;">${{$wishlist->product->current_price }}</a></h2>
                      
                      <!-- <div class="prd-price">-->
                      <!--    <div class="price-old">$ 200</div>-->
                      <!--    <div class="price-new">$ 180</div>-->
                      <!--</div>-->
                      
                  </div>
                  <div class="prd-hovers">
                      <div class="prd-circle-labels">
                          <div>
                            <a  class="circle-label-compare circle-label-wishlist--add mt-0 deleteItem" data-wishlistID="{{ $wishlist->id}}" title="Add To Wishlist" >
                                <i class="icon-recycle"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
       @endforeach
       @endif
      
      <!--  <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm" style="">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels"> </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>-->
      <!--              <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> -->
      <!--            </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Seiko</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
      <!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm" style="">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels">-->
      <!--                    <div class="label-new"><span>New</span></div>-->
      <!--                    <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>-->
      <!--                        <div class="countdown-circle">-->
                                  
      <!--                        </div>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">-->
      <!--              <i class="icon-heart-stroke"></i>-->
      <!--            </a>-->
      <!--            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>-->
      <!--            </a> -->
      <!--        </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Banita</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div>-->
      <!--                      <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>-->
      <!--                    </div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-old">$ 200</div>-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
      <!--  <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm" style="">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels"> </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>-->
      <!--              <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> -->
      <!--            </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Seiko</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
      <!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels">-->
      <!--                    <div class="label-new"><span>New</span></div>-->
      <!--                    <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>-->
      <!--                        <div class="countdown-circle">-->
                                  
      <!--                        </div>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">-->
      <!--              <i class="icon-heart-stroke"></i>-->
      <!--            </a>-->
      <!--            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>-->
      <!--            </a> -->
      <!--        </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Banita</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div>-->
      <!--                      <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>-->
      <!--                    </div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-old">$ 200</div>-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
      <!--  <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels"> </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>-->
      <!--              <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> -->
      <!--            </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Seiko</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
      <!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels">-->
      <!--                    <div class="label-new"><span>New</span></div>-->
      <!--                    <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>-->
      <!--                        <div class="countdown-circle">-->
                                  
      <!--                        </div>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">-->
      <!--              <i class="icon-heart-stroke"></i>-->
      <!--            </a>-->
      <!--            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>-->
      <!--            </a> -->
      <!--        </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="fade-up ls-is-cached lazyloaded" alt="Color Name"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Banita</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div>-->
      <!--                      <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>-->
      <!--                    </div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-old">$ 200</div>-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->

      <!--  <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels"> </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>-->
      <!--              <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> -->
      <!--            </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Seiko</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Midi Dress with Belt&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-06-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
      <!--<div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">-->
      <!--    <div class="prd-inside">-->
      <!--        <div class="prd-img-area"> <a href="product.html" class="prd-img image-hover-scale image-container"> -->
      <!--          <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img fade-up ls-is-cached lazyloaded">-->
      <!--                <div class="foxic-loader"></div>-->
      <!--                <div class="prd-big-squared-labels">-->
      <!--                    <div class="label-new"><span>New</span></div>-->
      <!--                    <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>-->
      <!--                        <div class="countdown-circle">-->
                                  
      <!--                        </div>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </a>-->
      <!--            <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">-->
      <!--              <i class="icon-heart-stroke"></i>-->
      <!--            </a>-->
      <!--            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>-->
      <!--            </a> -->
      <!--        </div>-->
      <!--            <ul class="list-options color-swatch">-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="lazyload fade-up" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="lazyload fade-up" alt="Color Name"></a>-->
      <!--                </li>-->
      <!--                <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="" data-original-title="Color Name">-->
      <!--                  <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="lazyload fade-up" alt="Color Name"></a></li>-->
      <!--            </ul>-->
      <!--        </div>-->
      <!--        <div class="prd-info">-->
      <!--            <div class="prd-info-wrap">-->
      <!--                <div class="prd-info-top">-->
      <!--                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                </div>-->
      <!--                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>-->
      <!--                <div class="prd-tag"><a href="#">Banita</a></div>-->
      <!--                <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>-->
      <!--                <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--            <div class="prd-hovers">-->
      <!--                <div class="prd-circle-labels">-->
      <!--                    <div>-->
      <!--                      <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>-->
      <!--                    </div>-->
      <!--                    <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>-->
      <!--                </div>-->
      <!--                <div class="prd-price">-->
      <!--                    <div class="price-old">$ 200</div>-->
      <!--                    <div class="price-new">$ 180</div>-->
      <!--                </div>-->
      <!--                <div class="prd-action">-->
      <!--                    <div class="prd-action-left">-->
      <!--                        <form action="#"> <button class="btn js-prd-addtocart" data-product="{&quot;name&quot;: &quot;Oversized Cotton Blouse&quot;, &quot;path&quot;:&quot;images/skins/fashion/products/product-03-1.webp&quot;, &quot;url&quot;:&quot;product.html&quot;, &quot;aspect_ratio&quot;:0.778}">Add To Cart</button> </form>-->
      <!--                    </div>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--        </div>-->
      <!--    </div>-->
      <!--</div>-->
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
      $(document).on('click','.deleteItem',function(){
        var id = $(this).attr('data-wishlistID');        
        var url = '{{ route("account-wishlist.destroy", ":id") }}';
        url = url.replace(':id', id);    
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
</script>
  @endsection
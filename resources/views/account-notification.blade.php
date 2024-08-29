@extends('layouts.master')
@section('content')
<style>
   .prd .prd-inside {
   overflow: hidden;
   background-color: #fff;
   border: 1px solid #ededed;
   height: 230px;
   padding: 0px 11px;
   }
     body{
    
    background-color: #f1f3f6;
}
.holder{
    margin-top:20px !important;
}

</style>
<div class="page-content page-content2">
   <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
         <ul class="breadcrumbs">
            <li><a href="{{ route('home.index')}}">Home</a></li>
            <li><span>My Notification</span></li>
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
                     <h1 class="mb-2 w-l">All Notification</h1>
                     <div class="empty-wishlist js-empty-wishlist text-center py-3 py-sm-5 d-none" style="opacity: 0;">
                        <h3>Your Wishlist is empty</h3>
                        <div class="mt-5">
                           <a href="{{ route('home.index')}}" class="btn">Continue shopping</a>
                        </div>
                     </div>
                     <div class="prd-grid-wrap">
                        <div class="product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid prd-listview product-listing2" data-grid-tab-content="">
                          @if(!empty($orders))
                          @foreach($orders as $key=> $order)
                           <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">
                              <div class="prd-inside">
                                 <div class="prd-img-area">
                                    <a href="{{route('product.show',$order->orderDetail[0]->product_id)}}" class="prd-img image-hover-scale image-container prd-img2 noti-img">
                                       Click Here 
                                       <div class="foxic-loader"></div>
                                    </a>
                                 </div>
                                 <div class="prd-info">
                                    <div class="prd-info-wrap">
                                       <p class="noti-head">Your order #{{$order->id}} has been delivered !</p>
                                       <span class="noti-date"> {{ date('d,M Y', strtotime($order->updated_at)) }}</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                          @if(!empty($products))
                          @foreach($products as $key=> $product)
                           <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-sm">
                              <div class="prd-inside">
                                 <div class="prd-img-area">
                                    <a href="{{route('product.show',$product->id)}}" class="prd-img image-hover-scale image-container prd-img2 noti-img">
                                       Click Here
                                       <div class="foxic-loader"></div>
                                    </a>
                                 </div>
                                 <div class="prd-info">
                                    <div class="prd-info-wrap">
                                       <p class="noti-head">New product has been listed!</p>
                                       <span class="noti-date"> {{ date('d,M Y', strtotime($product->created_at)) }}</span>
                                    </div>
                                 </div>
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
      </div>
   </div>
</div>
@endsection
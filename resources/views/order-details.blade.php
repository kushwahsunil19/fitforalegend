@extends('layouts.master')
@section('content')

<style>
.form-group{border: none; margin-top: 20px !important; margin-bottom: 0px !important}
</style>

<div class="page-content page-content2">
	<div class="holder breadcrumbs-wrap mt-0">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="{{ route('home.index')}}">Home</a></li>
			<li><span>Order details</span></li>
		</ul>
	</div>
</div>
	<div class="holder">
	<div class="container">
		<div class="row">
			<div class="col-md-18 aside mb-3">
			    
			
				<div class="row vert-margin">
					<div class="col-sm-18 col-md-18 ">
						<div class="card card2">
							<div class="card-body">
							    <div class="row">
							        <div class="col-md-18 order-sec  border-0">
						                <h4 class="order-nm text-left pl-1"> Delivery Address </h4>
							            <div class="row ">
							                <div class="col-md-6 d-block text-center">
						                        <div class="form-group">
						                            <label> Full name </label>
						                            <p class="order-nm text-left pl-1 pt-0 address-nm">{{ $order->user->first_name}} {{ $order->user->last_name}}</p>
						                        </div>
						                        <div class="form-group">
						                            <label> Order </label>
						                            <p  class="order-nm text-left pl-1  pt-0 address"># {{$order->id}}</p>
						                        </div>
							                </div>
							                <div class="col-md-6 d-block text-center">
						                        <div class="form-group">
						                            <label> Country Code </label>
						                            <p  class="order-nm text-left pl-1  pt-0 address">+{{$order->user->country_code}}</p>
						                        </div>
						                        <div class="form-group">
						                            <label> Sub Total </label>
						                            <p  class="order-nm text-left pl-1  pt-0 address">{{$order->total_amount}}</p>
						                        </div>
							                </div>
							                <div class="col-md-6 d-block text-center">
							                    <div class="form-group">
						                            <label> Phone number </label>
						                            <p class="order-nm text-left pl-1 pt-0 address-nm">{{$order->user->phone}}</p>
						                        </div>
							                </div>
							            </div>
				                        <div class="form-group">
				                            <label> Address </label>
				                            <p  class="order-nm text-left pl-1  pt-0 address">{{ $order->address1}}</p>
				                        </div>
							        </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
       
             @if(!empty($orders))
            @foreach($orders as $key=> $detail)
            <?php $product_id =$detail->product_id;?>
			<div class="col-md-18 aside">
				<div class="row vert-margin">
					<div class="col-sm-18 col-md-18">
						<div class="card card2">
							<div class="card-body">
							    <div class="row">
							        <div class="col-md-18  border-0">
                                       
							            <div class="row ">
							                <div class="col-md-2 d-block text-center order-details ml-1">
							                    <img src="{{asset('public/uploads/products/')}}/{{$detail->product->image }}" class="order-img">
							                </div>
							                <div class="col-md-4 p-0">
							                    <a href="#">
							                        <h4 class="order-nm order-dtl" style="margin-bottom: 10px !important;">{{ $detail->product->product_name}} </h4>
							                    </a>
							                    <p class="order-nm order-dtl2"><b>Seller</b> : {{ $detail->product->subCategory->subcategory_name }} </p>
                                                
							                    <p class="order-nm order-dtl2"><b>Price</b> : {{$detail->variation_price}} </p>
                                             @if($detail->variation_id>0)
                                                <p class="order-nm order-dtl2"><b>Size</b> : {{$detail->productVariation->size->size_name}}
                                                </p>
                                             
                                               
                                                 <p class="order-nm order-dtl2"><b>Color</b> : {{$detail->productVariation->color->color_name}} </p>
                                                 @endif
                                                  <p class="order-nm order-dtl2"><b>Quantitiy</b> : {{$detail->quantity}} </p>
                                   @if(!empty($ratings))
                                   @foreach($ratings as $rating) 
                                   @if($rating->product_id == $product_id)
                                   <div class="prd-rating prd-rtn rate">
							                   <?php  $count=number_format((float)((float)5 - (float)$rating->user_rating), 1, '.', '');?>
							                    @for($i=0.5;$i < $rating->user_rating; $i++)
							                  
							                    <i class="icon-star-fill fill"></i>
							                     @endfor
							                     @if(( $rating->user_rating ==0.5 || $rating->user_rating ==1.5 || $rating->user_rating ==2.5 || $rating->user_rating ==3.5 || $rating->user_rating ==4.5 ))

							                    <i class="fa-solid fa-star-half-stroke fill" style="color:#ffd400;"></i>
							                     @endif
							                   @for($i=0.5;$i < $count; $i++)
                                   <i class="fa-regular fa-star fill" style="color:#ffd400;"></i>
                                 @endfor 
                                 @if( $rating->user_rating ==0.5 ||  $rating->user_rating ==1 || $rating->user_rating ==1.5 )  
						                     <span class="rv-rt">Poor </span> 
						                     @elseif($rating->user_rating ==2 || $rating->user_rating ==2.5)	
						                     <span class="rv-rt">Average </span> 
						                     @elseif($rating->user_rating ==3 || $rating->user_rating ==3.5)	
						                     <span class="rv-rt">Good </span> 
						                     @elseif($rating->user_rating ==4 ||$rating->user_rating ==4.5 || $rating->user_rating ==5)	
						                      <span class="rv-rt">Excellent </span> 
						                     @endif
						                     ({{$rating->user_rating}})
							                  </div>
                                         
                                                     @endif
                                                     @endforeach
                                                     @endif

                                 

							                </div> 
                                            
                                                               
							                <div class="col-md-8 text-center">
							                    <p class="order-nm order-dtl">As per your request, your item has been  {{$order->status}}</p>
							                    <ul class="info_ripple">
							                        <li class=" @if($order->status=='DELIVERED') done @endif"> Booking Confirm <span class="active"></span> </li>
							                        <li  class="@if($order->status=='DELIVERED') done @endif"> {{$order->status}} <span></span> </li>
							                    </ul>
							                    <div class="row">
							                        <div class="col-md-9">
							                            <p class="order-show">
                                                             {{ date('D,MY', strtotime($order->created_at)) }} &nbsp; {{ date('H:i:s', strtotime($order->created_at)) }}</p>
							                        </div>
							                        <!-- <div class="col-md-6">-->
							                        <!--    <p class="order-show">{{ date('H:i:s', strtotime($order->created_at)) }}</p>-->
							                        <!--</div>-->
							                         <div class="col-md-9">
							                            <p class="order-show">Item {{$order->status}}</p>
							                        </div>
							                    </div>
							                </div>
							                 <div class="col-md-3">
							                     <a href="javascript:;" class="help">
							                         
							                     <p class="order-nms help"> <i class="fa fa-question"></i> Need Help</p>
							                    </a>
							                </div>

							            </div>  
							            				
							            				<?php $is_review =true; ?>
							            			  @if(!empty($ratings))
                                   @foreach($ratings as $rating) 
                                   @if($rating->product_id == $product_id)
                                			<?php $is_review =false; ?>
                                		 <a href=""><button type="button" class="btn btn-primary" style="margin-top: 5px; float: right; margin-right: 40px;">  Reviewed  </button>
                                 	 	</a>                                 	
                                 	
                                 @endif
                                 @endforeach
                                 @if($is_review)
                                
                               	<a href="{{route('order-product-rating.index', ['order_id' =>$order->id, 'product_id' => $product_id,'variation_id' => $detail->variation_id])}}"><button type="button" class="btn btn-primary" style="margin-top: 5px; float: right; margin-right: 40px;"> Write Reviews  </button>
                                 	 	</a>
                                 	 	 @endif
                                 @endif


                                
                                     
							        </div>
							    </div>
							</div>
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
  @endsection
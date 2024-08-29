@extends('layouts.master')
@section('content')

<style>
/*    .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {*/
/*       border-color: #00c7ac !important;*/
/*    background-color: #f7f7f8 !important;*/
/*}*/
/*.form-control, .form-control:focus {*/
/*    color: #282828;*/
/*    border-width: 1px;*/
/*    border-style: solid;*/
/*    outline: 0 none;*/
/*    background-color: #fff !important;*/
/*    box-shadow: none !important;*/
/*}*/

/*.page-content p, .modal-content p {*/
/*    margin-bottom: 9px;*/
/*    font-weight: 500;*/
/*}*/

/*.page-content p span{*/
/*    font-weight: 700;*/
/*}*/
/*.custom_checkbox input:checked + label:after {*/
/*    content: '';*/
/*    display: block;*/
/*    position: absolute;*/
/*    top: 3px;*/
/*    left: 3px;*/
/*    width: 12px;*/
/*    height: 12px;*/
/*    border: none;*/
/*    border-width: 0 2px 2px 0;*/
/*    transform: rotate(45deg);*/
/*}*/
.custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
    background-image: auto !important;
        background: transparent;
}
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
			<div class="col-md-4 aside aside--left">
					<div class="list-group mb-2">
	    	<form>
              <div class="custom-control custom-checkbox side-ulist side-ulist2 custom_checkbox">
                <p class="order-fltr">Filters</p>
                <p class="order-fltr">Order Status</p>
                <div class="order-check orderStatus">
                    
                <input type="checkbox" class="custom-control-input status" id="customCheck" name="status" value="ORDERED">
                <label for="customCheck">Orderd</label>
                </div>
                 <div class="order-check orderStatus">
                    
                <input type="checkbox" class="custom-control-input status" id="customCheck2" name="status" value="DELIVERED">
                <label for="customCheck2">Delivered</label>
                </div>
                 <div class="order-check orderStatus">
                    
                <input type="checkbox" class="custom-control-input status" id="customCheck3" name="status" value="Cancelled">
                <label for="customCheck3">Cancelled</label>
                </div>
               
                
                <p class="order-fltr">OLDER TIME</p>
                 <div class="order-check">
                    
                <input type="radio" class="custom-control-input" id="customCheck5" name="order_time" value="last30Days" checked>
                <label class="custom-control-label" for="customCheck5">Last 30 Days</label>
                </div>
                 <div class="order-check">
                    
                <input type="radio" class="custom-control-input" id="customCheck6" name="order_time" value="2023">
                <label class="custom-control-label" for="customCheck6">2023</label>
                </div>
                 <div class="order-check">
                    
                <input type="radio" class="custom-control-input" id="customCheck7" name="order_time" value="2022">
                <label class="custom-control-label" for="customCheck7">2022</label>
                </div>
                <div class="order-check">
                    
                <input type="radio" class="custom-control-input" id="customCheck8" name="order_time" value="2021">
                <label class="custom-control-label" for="customCheck8">2021</label>
                </div>               
                <div class="order-check pb-3">
                    
                <input type="radio" class="custom-control-input" id="customCheck1" name="order_time" value="Older">
                <label class="custom-control-label" for="customCheck1">Older</label>
                </div>
              </div>
            </form>
				</div>
			</div>
			<div class="col-md-14 aside">
			    
         <form action="{{route('account-history.index')}}" method="get">			    
          <div class="input-group input-groups">
           
            <input type="text" class="form-control form-control2" placeholder="Search Orders" name="search" id="search" value="{{ Request::get('search') }}">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>

          </div>
        </form>	
				<div class="row vert-margin">
					<div class="col-sm-18 col-md-18">
						<div class="card card2">
							<div class="card-body">
							    <h3 class="mb-1 profile-nm mb-2">My Orders</h3>
							    <div class="row orderfilterData">
                                    @if(!empty($orders))
                                    @foreach($orders as $order)
							       
                                <div class="col-md-18 order-sec">
                                <a href="{{route('order-details.show',$order->id)}}" class="text-dark">
                                <div class="row ">
                                    <div class="col-md-7  d-block text-justify ml-1" >
                                       
                                    <p class="order-nm" style="font-size:17px; margin-bottom: 7px;">ORDER # {{$order->id}}</p>
                                    <p class="order-nm mt-0" style="font-size:14px;"> <span>Order on</span> {{ date('D,MY', strtotime($order->created_at)) }}</p>
                                    <p class="order-nm mt-0" style="font-size:14px;"> <span>Payment Type</span>: {{ $order->payment_type }}</p>
                                    <p class="order-nm mt-0" style="font-size:14px;"> <span>TransactionId</span>: {{ $order->transaction_id }}</p>
                                    </div>
                                   
                                    <div class="col-md-3">
                                         <p class="order-nm" style="font-size:15px;">Total</p>
                                        <p class="order-nm mt-0" style="font-size:15px;">${{$order->total_amount}}</p>
                                    </div>
                                     <div class="col-md-7 text-right">
                                        <p class="order-nm"><i class="fa fa-circle"></i> {{$order->status}} on {{ date('D,MY', strtotime($order->created_at)) }}</p>
                                         <p class="order-nms">Your Item Has Been {{$order->status}}</p>
                                          <p class="order-nms"> {{$order->created_at}}</p>

                                        
                                    </div>
                                </div>
                                </a>
                                        
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
       
  $(document).on('change','.order-check',function(){
        $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         
        var search = $('#search').val();
        var status ='';   
        var order_time ='';   
       var status =$('.order-check  input[name="status"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(',');
       
        /* order_time =$('.order-check  input[name="order_time"]:checked').map(function(n){
           if(this.checked){
                 return  this.value;
               };
        }).get().join(','); */
       order_time = $('input[name="order_time"]:checked').val();

             $.ajax({
               url    :"{{ route('order.filter') }}",
               type   : "post",
               data   :{'status':status,'order_time':order_time,'search':search,"_token": "{{ csrf_token() }}"},
       
               success: function(result) {                   
                   $('.orderfilterData').html( result );
               }
           })
        
});
       </script>
  @endsection
@include('admin::layouts.header')
@include('admin::layouts.sidebar')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Order</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Order</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               @csrf
               @if ($message = Session::get('success'))
               <div class="alert alert-success">
                  <strong>{{ $message }}</strong>
               </div>
               @endif
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <div class="card card-primary">
                  <form action="" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">User name</label>
                                 <h6> {{ $orderDetail->user->first_name}} {{ $orderDetail->user->last_name}} </h6>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Phone number</label>
                                 <h6> {{ $orderDetail->user->phone}} </h6>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Order id</label>
                                 <h6> #{{ $orderDetail->id}} </h6>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Payment Type</label>
                                 <h6> {{ $orderDetail->payment_type}} </h6>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Trasaction ID</label>
                                 <h6> {{ $orderDetail->transaction_id}} </h6>
                              </div>
                           </div>
                           @if($orderDetail->refund_id)
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">refund ID</label>
                                 <h6> {{ $orderDetail->refund_id}} </h6>
                              </div>
                           </div>
                           @endif
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Address</label>
                                 <h6> {{ $orderDetail->address1}} </h6>
                              </div>
                           </div>
                           
                        </div>
                        <div class="row">
                        	 @if($orderDetail->status!='DELIVERED' && $orderDetail->status!='CANCELLED')
                                 <div class="col-md-6">
                                    <button type="button" class="btn btn-primary order_status" data-orderId="{{ $orderDetail->id}}" data-order_status="DELIVERED">Deliver Product </button>
                                 </div>
                                 @endif
                                  @if($orderDetail->status!='DELIVERED' && $orderDetail->status!='CANCELLED')
                                  <div class="col-md-6">
                                    <button type="button" class="btn btn-primary order_status" data-orderId="{{ $orderDetail->id}}" data-order_status="CANCELLED">Cancel Order </button>
                                 </div>
                                 @endif
                        </div>
                        <div class="table_sec">
                           <h4> Product details  </h4>
                           @if(!empty($orderDetails))
                           @foreach($orderDetails as $key => $detail )
                           <section style="background: #f4f6f9; padding: 15px 15px; border: 1px solid #dfdfdf;">
                              <div class="row">
                                 <div class="col-md-2">
                                    <div class="product_img">
                                       <img src="{{asset("public/uploads/products/")}}/{{$detail->product->image}}" />
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Product title </label>
                                             <h6>{{$detail->product->product_name}}   </h6>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Seller </label>
                                             <h6> Clothcenter </h6>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Product Price </label>
                                             <h6> $@if(isset($detail->productVariation->variation_price)){{$detail->productVariation->variation_price}} @else {{$detail->variation_price}} @endif </h6>
                                          </div>
                                       </div>
                                       @if(isset($detail->productVariation->color->color_name))
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Product Color </label>
                                             
                                             <h6> {{$detail->productVariation->color->color_name}}</h6>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Product Size </label>
                                           
                                             <h6>{{$detail->productVariation->size->size_name}}</h6>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Date </label>
                                             <h6>{{ date('D,M Y', strtotime($orderDetail->created_at)) }} </h6>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Time </label>
                                             <h6> {{ date('H:i:s', strtotime($orderDetail->created_at)) }} </h6>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label> Status </label>
                                             <h6> {{ $orderDetail->status}} </h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                
                              </div>
                           </section>
                           @endforeach
                           @endif   
                        </div>
                     </div>
                     <div class="card-footer">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<style>
   .card-body h6{margin-bottom: 0; font-size: 16px; font-weight: 600; color: #444; text-align: left;}
   .table_sec{
   width: 100%;
   background: none;
   padding: 15px 0px;
   }.table_sec h4{
   text-align: left;
   margin-bottom: 15px;
   font-size: 22px;
   font-weight: 600;
   }.product_img {
   width: 100%;
   background: none;
   padding: 0px;
   max-width: 275px;
   margin: auto;
   }.product_img img {
   width: 100%;
   display: block;
   margin: auto;
   border: 1px solid #dbdbdb;
   padding: 3px;
   height: 250px;
   object-fit: cover;
   object-position: top;
   }
</style>
@include('admin::layouts.footer')
<script src="{{asset('public/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
   $(function () {
   	bsCustomFileInput.init();
   });
   $(document).on('click','.order_status',function(){
       $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
            var order_id = $(this).attr('data-orderId');
            var order_status = $(this).attr('data-order_status');
           
           $.ajax({
                 url    :"{{ route('order-status-update') }}",
                 type   : "post",
                 data   :{'id':order_id,'status':order_status,'_token': '{{ csrf_token() }}'},
     
                 success: function(data) {   
                    if(data){
                     location.reload();
                      }
                 }
   
                })
   })
</script>
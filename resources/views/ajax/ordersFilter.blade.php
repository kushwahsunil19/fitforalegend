                                    @if(!empty($orders))
                                    @foreach($orders as $order)
							       
                                <div class="col-md-18 order-sec">
                                <a href="{{route('order-details.show',$order->id)}}" class="text-dark">
                                <div class="row ">
                                    <div class="col-md-7  d-block text-justify ml-1" >
                                       
                                    <p class="order-nm" style="font-size:15px;">ORDER # {{$order->id}}</p>
                                    <p class="order-nm mt-0" style="font-size:15px;"> Order on {{ date('D,MY', strtotime($order->created_at)) }}</p>
                                    <p class="order-nm mt-0" style="font-size:14px;"> <span>Payment Type</span>: {{ $order->payment_type }}</p>
                                    <p class="order-nm mt-0" style="font-size:14px;"> <span>TransactionId</span>: {{ $order->transaction_id }}</p>
                                    </div>
                                   
                                    <div class="col-md-2">
                                         <p class="order-nm" style="font-size:15px;">Total</p>
                                        <p class="order-nm mt-0" style="font-size:15px;">${{$order->total_amount}}</p>
                                        
                                    </div>
                                     <div class="col-md-8 text-right">
                                        <p class="order-nm"><i class="fa fa-circle"></i> {{$order->status}} on {{ date('D,MY', strtotime($order->created_at)) }}</p>
                                         <p class="order-nms">Your Item Has Been {{$order->status}}</p>
                                        
                                    </div>
                                </div>
                                </a>
                            </div>
                                    @endforeach
							        @else
                                       <div class="col-md-18 order-sec">
                                         <p>There are no data.</p>  
                                       </div>
                                    @endif
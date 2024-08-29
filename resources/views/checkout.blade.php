@extends('layouts.master')
@section('content')
 
@if (Session::has('success'))



<div class="success" style="float:right;"> {{ Session::get('success') }}</div>  @endif
<div class="page-content">
   <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
         <ul class="breadcrumbs">
            <li><a href="{{ route('home.index')}}">Home</a></li>
            <li><span>Checkout</span></li>
         </ul>
      </div>
   </div>
  
   <div class="holder">
      <div class="container">
         <h1 class="text-center">Checkout wizard</h1>
         <div class="row">
            <div class="col-md-10">
               <div class="steps-progress">
                  <ul class="nav nav-tabs">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#step1" data-step="1"><span>01.</span><span>Shipping Address</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#step2" data-step="2"><span>02.</span><span>Billing Address</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#step4" data-step="4"><span>03.</span><span>Payment Method</span></a>
                     </li>
                  </ul>
                  <div class="progress">
                     <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 25%;"></div>
                  </div>
               </div>
                <form role="form"  action="{{ route('checkout.store') }}"  method="post"  class="require-order_place" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="sb-fhhwn27888527@business.example.com">
                    <input type="hidden" name="return" value="{{route('thank-you')}}">
   
               @csrf      
               <div class="tab-content">
                  <div class="tab-pane fade show active" id="step1">
                     <div class="tab-pane-inside">
                        <div class="clearfix mr-1">
                           <input id="shipping_address" value="In Store Pick Up" name="shipping_address" type="radio" class="radio" checked>
                           <label for="formcheckoutRadios" class="pick">In Store Pick Up</label>
                        </div>
                        <div class="text-right">
                           <button type="button" class="btn btn-sm step-next">Continue</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade " id="step2">
                     <div class="tab-pane-inside">
                        <!--<div class="clearfix">-->
                        <!--    <input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox">-->
                        <!--    <label for="formcheckoutCheckbox2">The same as shipping address</label>-->
                        <!--</div>-->
                        <div class="mt-2"></div>
                        <label>Country:</label>
                        <div class="form-group ">
                           <!--<select class="form-control form-control--sm" name="country" id="country"  >-->
                             <!--<option value="" ></option>-->
                           <!--   @foreach($countries as $country)-->
                           <!--   <option value="{{ $country->id }}" selected>{{ $country->name }}</option>-->
                           <!--   @endforeach-->
                                
                           <!--</select>-->
                            @foreach($countries as $country)
                          <input type="hidden" value="{{ $country->id }}" name="country" id="country" >
                           <input type="text" value="{{ $country->name }}"  class="form-control form-control--sm" readonly/>
                           @endforeach
                            @if ($errors->has('country'))
                                      <span class="text-danger">{{ $errors->first('country') }}</span>
                                  @endif
                        </div>
                        <div class="row">
                           <div class="col-sm-9">
                              <label>State:</label>
                              <div class="form-group select-wrapper">
                                 <select class="form-control form-control--sm" name="state" id="state" required>
                                   <option value="">-- Select State --</option> 
                                 </select>
                                  @if ($errors->has('state'))
                                      <span class="text-danger">{{ $errors->first('state') }}</span>
                                  @endif
                                  <div class="statemsg"></div>
                              </div>
                           </div>
                           <div class="col-sm-9">
                              <label>zip/postal code:</label>
                              <div class="form-group">
                                
                             {{ Form::text('zipcode', '', array('placeholder'=>'zipcode',   'id'  => 'zipcode', 'class'=>$errors->has('email') ? 'form-control has-error' : 'form-control form-control--sm')) }}
                                  @if ($errors->has('zipcode'))
                                      <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                  @endif
                                  <div class="zipmsg"></div>
                              </div>
                           </div>
                        </div>
                        <div class="mt-2"></div>
                        <label>Address :</label>
                        <div class="form-group">
                           <!--<input type="text" class="form-control form-control--sm">-->
                           <textarea row="7" class="form-control form-control--sm" name="address1" id="address1" required style="resize:none;"></textarea>
                              @if ($errors->has('address1'))
                                      <span class="text-danger">{{ $errors->first('address1') }}</span>
                                  @endif
                               <div class="address1msg"></div>
                        </div>
                        <div class="mt-2"></div>
                        <div class="text-right">
                           <button type="submit" class="btn btn-sm step-next second_step" >Continue</button>
                           
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="step4">
                     <div class="tab-pane-inside">
                        <div class="d-flex flex-wrap">
                           <div class="clearfix mr-1">
                              <input id="formcheckoutRadio4" value="Credit Card" name="payment_type" type="radio" class="radio payment_type" checked="checked">
                              <label for="formcheckoutRadio4">Credit Card</label>
                           </div>
                           <div class="clearfix mr-1">
                              <input id="formcheckoutRadio6" value="Debit Card" name="payment_type" type="radio" class="radio payment_type">
                              <label for="formcheckoutRadio6">Debit Card</label>
                           </div>
                           <!--<div class="clearfix mr-1" >
                              <input id="formcheckoutRadio5" value="Apple Pay" name="radio2" type="radio" class="radio payment_type">
                              <label for="formcheckoutRadio5"> Apple Pay</label>
                           </div>-->
                           <div class="clearfix mr-1">
                              <input id="formcheckoutRadio7" value="Apple Pay" name="payment_type" type="radio" class="radio payment_type">
                              <label for="formcheckoutRadio7">Apple Pay</label>
                           </div>
                           <!--<span class="mr-1">and</span>-->
                           <div class="clearfix mr-1">
                              <input id="formcheckoutRadio8" value="After Pay" name="payment_type" type="radio" class="radio payment_type">
                              <label for="formcheckoutRadio8">After Pay</label>
                           </div>
                           <div class="clearfix mr-1">
                            <input id="formcheckoutRadio9" value="PayPal" name="payment_type" type="radio" class="radio payment_type">
                            <label for="formcheckoutRadio9">PayPal</label>
                           </div>
                        </div>
                        <div class="hideDiv">
                            <div class="mt-2"></div>
                            <label>Cart Number</label>
                            <div class="form-group">
                                 {{ Form::text('cart_no', '', array('placeholder'=>'Cart Number','id'  => 'cart_no', 'class'=>$errors->has('cart_no') ? 'form-control has-error' : 'form-control form-control--sm')) }}
                             
                                @if ($errors->has('cart_no'))
                                          <span class="text-danger">{{ $errors->first('cart_no') }}</span>
                                      @endif
                                      <div class="cartmsg"></div>
                            </div>
                            <div class="row">
                               <div class="col-sm-9">
                                  <label>Month:</label>
                                  <div class="form-group select-wrapper">
                                     <select class="form-control form-control--sm" name="month" id="month">
                                        <option selected value='1'>January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="col-sm-9">
                                  <label>Year:</label>
                                  <div class="form-group select-wrapper">
                                     <select class="form-control form-control--sm" name="year">
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                     </select>
                                  </div>
                               </div>
                            </div>
                            <div class="mt-2"></div>
                            <label>CVV Code</label>
                            <div class="form-group">
                              
                                 {{ Form::text('cvv', '', array('placeholder'=>'cvv', 'id'  => 'cvv', 'class'=>$errors->has('cvv') ? 'form-control has-error' : 'form-control form-control--sm')) }}
                                 @if ($errors->has('cvv'))
                                          <span class="text-danger">{{ $errors->first('cvv') }}</span>
                                      @endif
                                      <div class="cvvmsg"></div>
                            </div>
                        </div>
                     </div>
                     <?php $total_price = 0;
                     $product_id = [];
                     $variation_id = [];   
                     $quantity = [];
                     $price = [];
                     ?>
                  @if(!empty($items))
                  @foreach($items as $item)

                   <?php 

                     $variation = getProductVariation($item->variation_id);
                    
                      $variation_price =($item->variation_price)?$item->variation_price:0; 
                      $in_stock = isset($variation->in_stock)?$variation->in_stock:$item->product->in_stock;
                     $total_price += (float)(isset($variation_price)?$variation_price:$item->product->current_price) * $item->quantity;
                         ?>
                    
                     <input type="hidden" name="product_id[]" id="product_id[]" value="{{ $item->product_id}}">
                     <input type="hidden" name="variation_id[]" id="variation_id[]" value="{{$item->variation_id}}">
                     <input type="hidden" name="quantity[]" id="quantity[]" value="{{ $item->quantity }}">  
                     <input type="hidden" name="variation_price[]" id="variation_price[]" value="{{ $item->variation_price }}">
                            @endforeach    
                  @endif 
                  <?php if(isset($userCoupon->coupon->discount)){
                     
                    $total_price = $total_price - ($total_price * ($userCoupon->coupon->discount/100));
                  }?> 
                    
                     <input type="hidden" name="total_amount" id="total_amount" value="{{ $total_price}}">  
                     <div class="clearfix mt-1 mt-md-2">
                        <button type="submit" class="btn btn--lg w-100 placeOrder">Place Order</button>
                     </div>
                  </div>
               </div>
               </form>
            </div>
            <div class="col-md-8 pl-lg-8 mt-2 mt-md-0">
               <h2 class="custom-color">Order Summary</h2>
               <div class="cart-table cart-table--sm pt-3 pt-md-0">
                  <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                     <div class="cart-table-prd-image text-center">
                        Image
                     </div>
                     <div class="cart-table-prd-content-wrap">
                        <div class="cart-table-prd-info">Name</div>
                        <div class="cart-table-prd-qty">Qty</div>
                        <div class="cart-table-prd-price">Price</div>
                     </div>
                  </div>
                  <?php $total_price = 0;
                     $product_id = [];
                     $variation_id = [];
                     $quantity = [];
                     $price = [];
                     $in_stock = [];
                     ?>
                  @if(!empty($items))
                  @foreach($items as $item)
                  <?php
                    $variation = getProductVariation($item->variation_id);
                     $in_stock = isset($variation->in_stock)?$variation->in_stock:$item->product->in_stock;
                     $variation_price = isset($variation->variation_price)?$variation->variation_price:$item->product->current_price;
                   ?>
                  <div class="cart-table-prd">
                     <div class="cart-table-prd-image">
                        <a href="#" class="prd-img"><img class="lazyload fade-up" src="{{asset('public/uploads/products/')}}/{{$item->product->image }}" data-src="{{asset('public/uploads/products/')}}/{{$item->product->image }}" alt=""></a>
                     </div>
                     <div class="cart-table-prd-content-wrap">
                        <div class="cart-table-prd-info">
                           <h2 class="cart-table-prd-name text-dark" style="font-size:15px;"><a href="javascript:;" style="color:#282828;">{{$item->product->product_name}}</a></h2>
                        </div>
                       
                        <div class="cart-table-prd-qty">
                           <div class="qty qty-changer">
                              <input type="text" class="qty-input disabled" value="{{$item->quantity}}" data-min="0" data-max="1000" >
                           </div>
                        </div>
                        <div class="cart-table-prd-price-total">
                           ${{ $variation_price * $item->quantity}}.00
                        </div>
                     </div>
                  </div>
                    
                  <?php 
                 
                     $total_price += (float)$variation_price * $item->quantity;
                     ?>
                  @endforeach    
                  @endif  
               </div>
               <div class="mt-2"></div>
               <div class="mt-2"></div>
               <div class="card">
                  <div class="cart-total-sm card-body card-body3">
                     <span class="cart-nm">Coupon Discount Amount </span>
                       
                     <span class="card-total-price mb-0" data-subtotal="{{$total_price}}">- $ @if(isset($userCoupon->coupon->discount)){{ $total_price * ($userCoupon->coupon->discount/100)  }}.00
                     @else
                     0.00
                     @endif</span>

                  </div>
               </div>
               <div class="card">
                  <div class="cart-total-sm card-body card-body3">
                   

                 <span class="cart-nm">Subtotal</span>
 
                     <span class="card-total-price mb-0" data-subtotal="{{$total_price}}">$ @if(isset($userCoupon->coupon->discount))
                        {{$total_price - ($total_price * ($userCoupon->coupon->discount/100))  }}.00
                     @else
                    {{$total_price}}.00
                     @endif
                     </span>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<style>
    a:hover{
    color: #343a40 !important;
}
.cart-nm{
        color: #000 !important;
    font-weight: 600 !important;
}
.cart-table--sm .cart-table-prd-price-total {
    font-size: 20px;
    padding-right: 10px;
}
.cart-table-prd-content-wrap .cart-table-prd-price {
    margin-top: 0px !important;
}

.card-total-price {
    font-size: 20px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $(document).on('click','.placeOrder',function(){
      var variation_id = $('#variation_id').val();
      var product_id = $('#product_id').val();
      var quantity = $('#quantity').val();
      var variation_price = $('#variation_price').val();
      var shipping_address = $('#shipping_address').val();
      var country =  $("#country option:selected").val();
      var state =  $("#state option:selected").val();
      var zipcode = $('#zipcode').val();
      var address1 = $('#address1').val();
      var payment_type = $('.payment_type').val();
      var cart_no = $('#cart_no').val();
      var month =  $("#month option:selected").val();
      var year =  $("#year option:selected").val();
      var cvv = $('#cvv').val();       
      var total_amount = $('.card-total-price').attr('data-subtotal'); 
   
      $.ajax({
                url :"{{ route('checkout.store') }}",
                type : "post",
                data :{
                        
                        'variation_id':variation_price,
                        'product_id':product_id,
                        'quantity':quantity,
                        'variation_price':variation_price,
                        'country':country,
                        'shipping_address':shipping_address,
                        'state':state,
                        'zipcode':zipcode,
                        'address1':address1,
                        'payment_type':payment_type,
                        'cart_no':cart_no,
                        'month':month,
                        'year':year,
                        'cvv':cvv,
                        'total_amount':total_amount,
                        '_token': '{{ csrf_token() }}'
                      },
           success: function(data) {
              showNotification();
             $('.success').html('<p><strong>Success!</strong> Item Orderd successfully</p>')
           }
         });
     });
         /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
               var idCountry = $('#country').val();
                $.ajax({
                    url: "{{ route('fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
           /* $('#country').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{ route('fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });*/
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

    });
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
$(".placeOrder").prop( "disabled", true );
$('.cvvmsg').html('<span style="color:red;">The cvv field is required.</span>');
$('.cartmsg').html('<span style="color:red;">The cart no. field is required.</span>');
$(document).on('click','.payment_type',function(){
    var radioValue = $("input[name='payment_type']:checked").val();
    if(radioValue==='PayPal'){
       $(".hideDiv").hide();
     $(".placeOrder").prop( "disabled", false );
    }else if(radioValue==='Credit Card' || radioValue==='Debit Card'){
         $(".hideDiv").show();
         $(".placeOrder").prop( "disabled", true );
    }
});
   $('#cart_no').keyup(function(){ 
        var cart_no = $(this).val();
         var cvv = $('#cvv').val();
        if(cart_no !== '')
        {
             $('.cartmsg').html('');
        }else{
             $('.cartmsg').html('<span style="color:red;">The cart no. field is required.</span>');	
             $(".placeOrder").prop( "disabled", true );  
        }
        if(cart_no!=='' && cvv !== ''){
              $(".placeOrder").prop( "disabled", false );  
        }
   });
    $('#cvv').keyup(function(){ 
        var cvv = $(this).val();
        var cart_no = $('#cart_no').val();
       
        if(cvv !== '')
        {
             $('.cvvmsg').html('');
              $(".placeOrder").prop( "disabled", false );  
        }else{
             $('.cvvmsg').html('<span style="color:red;">The cvv field is required.</span>');	
             $(".placeOrder").prop( "disabled", true );  
        }
        if(cart_no!=='' && cvv !== '' ){
            
              $(".placeOrder").prop( "disabled", false );  
        }
        
   });

   $('.zipmsg').html('<span style="color:red;">The zipcode field is required.</span>');
   $('.statemsg').html('<span style="color:red;">The state field is required.</span>');	
    $('.address1msg').html('<span style="color:red;">The address field is required.</span>');	
$(".second_step").prop( "disabled", true );  
    $('#address1').keyup(function(){ 
        var address1 = $(this).val();
        var state =  $("#state option:selected").val();
        var zipcode = $('#zipcode').val();
        if(address1 !== '')
        {
             $('.address1msg').html('');
        }else{
             $('.address1msg').html('<span style="color:red;">The address field is required.</span>');	
             $(".second_step").prop( "disabled", true );  
              $(".placeOrder").prop( "disabled", true );  
        }
         if( state !== '')
        {
           $('.statemsg').html('');    
        
        }
         if( zipcode !== '')
        {
             $('.zipmsg').html(''); 
        }
        
        if(address1 !== '' && zipcode !== '' && state !== '')
        {
          $(".second_step").prop( "disabled", false );  
          
        }
        
    });
    $(".second_step").prop( "disabled", true );  
    $('#zipcode').keyup(function(){ 
        var zipcode = $(this).val();
        var state =  $("#state option:selected").val();
        var zipcode = $('#zipcode').val();
        var address1 = $('#address1').val();
        
        if(address1 !== '')
        {
             $('.address1msg').html('');
        }
         if( state !== '')
        {
           $('.statemsg').html('');    
        
        }
         if( zipcode !== '')
        {
             $('.zipmsg').html(''); 
        }else{
             $('.zipmsg').html('<span style="color:red;">The zipcode field is required.</span>');	
             $(".second_step").prop( "disabled", true );  
             $(".placeOrder").prop( "disabled", true ); 
        }
        
        if(address1 !== '' && zipcode !== '' && state !== '')
        {
          $(".second_step").prop( "disabled", false ); 
         
        }
        
    });
    $('#state').change(function(){ 
        var state = $(this).val();
        var state =  $("#state option:selected").val();
        var zipcode = $('#zipcode').val();
        var address1 = $('#address1').val();
        
        if(address1 !== '')
        {
             $('.address1msg').html('');
        }
         if( state !== '')
        {
           $('.statemsg').html('');    
        
        }else{
             $('.statemsg').html('<span style="color:red;">The state field is required.</span>');	
             $(".second_step").prop( "disabled", true );  
        }
         if( zipcode !== '')
        {
             $('.zipmsg').html(''); 
        }
        
        if(address1 !== '' && zipcode !== '' && state !== '')
        {
          $(".second_step").prop( "disabled", false );  
        }
        
    });
</script>


@endsection
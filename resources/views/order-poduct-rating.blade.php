@extends('layouts.master')
@section('content')

<style>
    .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
       border-color: #00c7ac !important;
    background-color: #f7f7f8 !important;
}
.form-control, .form-control:focus {
    color: #282828;
    border-width: 1px;
    border-style: solid;
    outline: 0 none;
    background-color: #fff !important;
    box-shadow: none !important;
}
.card2 .form-group label{
    padding-left: 0px;
}
label.full, label.half {
    font-size: 9px !important;
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
			
			<div class="col-md-18 aside">
			    
         
				<div class="row vert-margin">
					<div class="col-sm-18 col-md-18">
						<div class="card card2">
							<div class="card-body">
							    <h3 class="mb-1 profile-nm mb-2">Write Review</h3>
                                <!--<p>{{$product->product_name}} </p>-->
                                
                                    <form action="{{ route('order-product-rating.store')}}" method="POST">
                                     @csrf
							    <div class="row">
                                   
                                    <input type="hidden" name="order_id" value="{{ app('request')->input('order_id') }}">
                                <input type="hidden" name="product_id" value="{{ app('request')->input('product_id') }}">
                                <input type="hidden" name="variation_id" value="{{ app('request')->input('variation_id') }}">
                               
                                    <div class="col-md-18">
                                        <div class="form-group">
                                            <label style="display: block; font-size: 18px; font-weight: 600;">Rate this product </label>
                                             <div class="rating" style="margin-top: 10px;">
                                                    <fieldset class="rating rating-fieldset">
                                                            <input type="checkbox"  id="star5" class="rating-checkbox" value="5" name="star"/><label class = "full" for="star5" title="Great"></label>
                                                            <input type="checkbox" id="star4half" class="rating-checkbox" value="4.5" name="star"/><label class="half" for="star4half" title="Great - 4.5 stars"></label>
                                                            <input type="checkbox" id="star4" class="rating-checkbox" value="4" name="star"/><label class = "full" for="star4" title="Good"></label>
                                                            <input type="checkbox" id="star3half" class="rating-checkbox" value="3.5" name="star"/><label class="half" for="star3half" title="Good - 3.5 stars"></label>
                                                            <input type="checkbox" id="star3" class="rating-checkbox" value="3" name="star"/><label class = "full" for="star3" title="Average"></label>
                                                            <input type="checkbox"  id="star2half" class="rating-checkbox" value="2.5" name="star"/><label class="half" for="star2half" title="Average - 2.5 stars"></label>
                                                            <input type="checkbox" id="star2" class="rating-checkbox" value="2" name="star"/><label class = "full" for="star2" title="Not Good"></label>
                                                            <input type="checkbox" id="star1half" class="rating-checkbox" value="1.5" name="star"/><label class="half" for="star1half" title="Not Good - 1.5 stars"></label>
                                                            <input type="checkbox" id="star1" class="rating-checkbox" value="1" name="star"/><label class = "full" for="star1" title="Poor"></label>
                                                            <input type="checkbox" id="starhalf" class="rating-checkbox" value="0.5" name="star"/><label class="half" for="starhalf" title="Poor - 0.5 stars"></label>
                                      
                                                        </fieldset>
                                                        </div>
                                                  </div>
                                         
                                    </div>
                                    @if ($errors->has('user_rating'))
                                          <div class="col-md-18">
                                           <span class="text-danger">{{ $errors->first('user_rating') }}</span>
                                          </div>
                                       @endif 
                                    <div class="col-md-18" style="margin-top: 25px;">
                                        
                                        <div class="form-group">
                                            <label style="display: block; font-size: 18px; font-weight: 600;margin-bottom:15px;"> Review this product </label>
                                            <input type="hidden" name="user_rating" id="user_rating" value="">
                                            <textarea class="form-control" rows="6" placeholder="Enter somthing" name="user_comment" style="resize:none;"></textarea>
                                     @if ($errors->has('user_comment'))
                                      <span class="text-danger">{{ $errors->first('user_comment') }}</span>
                                  @endif
                                        </div>
                                    </div>
                                    <div class="col-md-18" style="margin-top: 25px;">
                                        <button type="submit" class="btn btn-primary"> Submit </button>
                                    </div>

                                </div>
                                </form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<style>
.rating {
  border: none;
  float: left;
  position: relative;
}
.rating fieldset {
  margin-right: 4px;
}
.rating > input {
  display: none;
}
.rating > input:checked + label:hover, .rating > input:checked ~ label:hover {
  color: #FFD700;
}
.rating > input:checked ~ label:hover ~ label {
  color: #FFD700;
}
.rating > input:checked ~ label.full:before {
  content: "";
}
.rating > input:checked ~ label.half:before {
  color: #FFD700;
  content: "";
}
.rating > label {
  color: #FFD700;
  float: right;
  cursor: pointer;
}
.rating > label:before {
  margin: 2px;
  font-size: 3.1em;
  font-family: "FontAwesome";
  display: inline-table;
  content: "";
}
.rating > label > input:checked ~ label {
  color: #FFD700;
}
.rating > label:hover ~ input:checked ~ label {
  color: #C41D6E;
}
.rating:not(:checked) > label:hover {
  color: #FFD700;
}
.rating:not(:checked) > label:hover ~ label:before {
  content: "";
}
.rating:not(:checked) > label.full:hover:before {
  content: "";
}
.rating:not(:checked) > label ~ label {
  color: #FFD700;
}
.rating > .half:before {
  content: "";
  position: absolute;
  color: transparent;
  font-size: 3.1em;
}
.rating > .half:hover:before {
  color: #FFD700;
}
.form-group {
    border: none !important;    
}
input[type='checkbox'] + label:before {
    background-color: transparent !important;
}
label.full, label.half{
    font-size: 9px !important;
}
.card2 .form-group label{
    text-transform: none;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
     $(document).on('change','.rating-checkbox',function(){
         star =$('.rating  input[name="star"]:checked').val();
         $("#user_rating").val(star);
     });  
  
       </script>
  @endsection
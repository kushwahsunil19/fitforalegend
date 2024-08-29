@include('admin::layouts.header')
@include('admin::layouts.sidebar')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Product </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product</li>
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
                  <div class="card-header">
                     <h3 class="card-title">Edit</h3>
                  </div>
                  <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" value="{{ $product->product_name }}">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Slug</label>
                                 <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug" value="{{ $product->slug }}">	
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Current Price</label>
                                 <input type="number" class="form-control" id="current_price" name="current_price" placeholder="Enter Current Price" value="{{ $product->current_price }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputFile">Previous Price</label>
                                 <input type="number" class="form-control" id="previous_price" name="previous_price" placeholder="Enter Previous Price" value="{{ $product->previous_price
                                    }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Master Category</label>
                                 <select class="form-control" name="master_category_id" id="master_category">
                                    <option value="" selected="">Select Master Category </option>
                                    @foreach($masterCategories as $masterCategory)
                                    <option value="{{$masterCategory->id}}" @if($masterCategory->id==$product->master_category_id) selected @endif>{{$masterCategory->master_category_name}} </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Category</label>
                                 <select class="form-control" name="category_id" id="category">
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}" @if($category->id==$product->category_id) selected @endif>{{$category->category_name}} </option>
                                 @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Sub Category</label>
                                 <select class="form-control" name="sub_category_id" id="sub_category">
                                 @foreach($subcategories as $subcategory)
                                 <option value="{{$subcategory->id}}" @if($subcategory->id==$product->sub_category_id) selected @endif>{{$subcategory->subcategory_name}} </option>
                                 @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Brand</label>
                                 <select class="form-control" name="brand_id" >
                                    <option value="0" selected="">Select One</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @if($brand->id==$product->brand_id) selected @endif >{{$brand->brand_name}} </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Tax</label>
                                 <select class="form-control" name="tax">
                                    <option value="" selected="">Select One</option>
                                    <option value="1"  @if($product->tax=='1') selected @endif>High Tax</option>
                                    <option value="2" @if($product->tax=='2') selected @endif>Low Tax</option>
                                    <option value="3" @if($product->tax=='3') selected @endif>No Tax</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">SKU</label>
                                 <input type="text" class="form-control" placeholder=""  name="sku" value="{{ $product->sku }}"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Video Link</label>
                                 <input type="text" class="form-control" placeholder=""  name="video_link" value="{{ $product->video_link }}"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <img src="{{asset("public/uploads/products/$product->image")}}" width="32px" height="32px">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Featured Image</label>
                                 <input type="file" class="form-control" placeholder="" name="image"/>
                              </div>
                           </div>
                         
                          
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Short Description </label>
                                 <textarea rows="5" class="form-control" placeholder="Description" name="short_description">{{ $product->short_description }}</textarea>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Description</label>
                                 <textarea rows="5" class="form-control"  name="description"placeholder="Description">{{ $product->description }}</textarea>
                              </div>
                           </div>
                        </div>
                      @foreach($masterCategories as $masterCategory)
                       @if($masterCategory->id==$product->master_category_id && $masterCategory->master_category_name =='Accessories')
		              <div class="col-md-6 assessary_stock">
										<div class="form-group">
											<label for="exampleInputPassword1">Total in stock</label>
											<input type="number" class="form-control" placeholder="" name="assessary_stock" value="{{ $product->in_stock}}" />
										</div>
						</div>
						@endif
					  @endforeach
                            @if(!empty($product->ProductImages))

                           @foreach ($product->ProductImages as $key => $image)
                        <div class="row" style="align-items: end; border-top: 1px solid #cbcbcb; margin-top: 25px; padding-top: 25px;">
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label for="exampleInputPassword1">Gallary Images</label>
                                    <input type="hidden" name="image_id[]" value="{{$image->id}}">
                                     <img src="{{asset("public/uploads/products/$image->images")}}" width="32px" height="32px">
                                  <input type="file" class="form-control" placeholder="" name="images[]"/>
                                 </div>
                                
                              </div>
                           </div>
                           <div class=col-md-2><button class="btn btn-danger deleteImg" data-imgID="{{$image->id}}" type=button>Delete</button></div>
                        </div>
                        @endforeach
                        @endif
                        <br>
                        <div class="row">
                           <div class="col-md-2">
                              <button type="button" class="btn btn-primary" id="addmoreImg"> Add More Image </button>
                           </div>
                        </div>
                        <main class="myImages">								    
                        </main>
                        @foreach ($product->productSpecification as $key => $spacification)
                        <div class="row" style="align-items: end; border-top: 1px solid #cbcbcb; margin-top: 25px; padding-top: 25px;">
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label for="exampleInputPassword1">Specification Name</label>
                                    <input type="hidden" name="specification_id[]" value="{{$spacification->id}}">
                                    <input type="text" class="form-control" placeholder="Enter Specification Name" name="specification_name[]" value="{{ $spacification->specification_name}}" />
                                 </div>
                                 <div class="col-md-6">
                                    <label for="exampleInputPassword1">Specification Description</label>
                                    <input type="text" class="form-control" placeholder="Enter Specification Description" name="specification_description[]"  value="{{ $spacification->specification_description}}"/>
                                 </div>
                              </div>
                           </div>
                           <div class=col-md-2><button class="btn btn-danger delete" data-sID="{{$spacification->id}}" type=button>Delete</button></div>
                        </div>
                        @endforeach
                        <br>
                        <div class="row">
                           <div class="col-md-2">
                              <button type="button" class="btn btn-primary" id="addmorebtn"> Add More Specification </button>
                           </div>
                        </div>
                        <main class="mymain">								    
                        </main>
                        @if(count($product->productVariation))
                        @foreach ($product->productVariation as $key => $variation)
                        <div class="row attribute" style="align-items: end; border-top: 1px solid #cbcbcb; margin-top: 25px; padding-top: 25px;">
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Select Size</label>
                                    <input type="hidden" name="variation_id[]" value="{{$variation->id}}">
                                    <select class="form-control" name="size_id[]" >
                                       <option value="" selected="">Select One</option>
                                       @foreach($sizes as $size)
                                       <option value="{{$size->id}}" @if($variation->size_id==$size->id) selected @endif >{{$size->size_name}} </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Select Color </label>
                                    <select class="form-control" name="color_id[]" >
                                       <option value="" selected="">Select One</option>
                                       @foreach($colors as $color)
                                       <option value="{{$color->id}}" @if($variation->color_id==$color->id) selected @endif>{{$color->color_name}} </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Stock </label>
                                    <input type="text" class="form-control" placeholder="Enter Stock" name="in_stock[]" value="{{$variation->in_stock}}" />
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Price </label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="variation_price[]"  value="{{$variation->variation_price}}" />
                                 </div>
                              </div>
                           </div>
                           <div class=col-md-2><button class="btn btn-danger deleteVariation"data-vID="{{$variation->id}}" type=button>Delete</button></div>
                        </div>
                        @endforeach

                        <br>
                        <div class="row">
                           <div class="col-md-2">
                              <button type="button" class="btn btn-primary" id="addmoreVariation"> Add More Size </button>
                           </div>
                        </div>
                        <span class="myspan">								    
                        </span>	
                          @endif				
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script src="{{asset('public/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
   $(document).ready(function(){
   	 $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     $('#addmorebtn').click(function(){
         $('main.mymain').append('<div style="align-items: end; margin-top: 20px;" class=row ><div class=col-md-10><div class=row><div class=col-md-6><label for=exampleInputPassword1>Specification Name</label> <input class=form-control placeholder="Enter Specification Name" name="specification_name[]" required></div><div class=col-md-6><label for=exampleInputPassword1>Specification Description</label> <input class=form-control placeholder="Enter Specification Description" name="specification_description[]" required></div></div></div><div class=col-md-2><button class="btn btn-danger delete" data-sID="" type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.delete', function(){
     	var s_id = $(this).attr('data-sID');
      if(s_id!=''){      	
      	$.ajax({
                url :"{{ route('delete-specification') }}",
                type : "post",
                data :{'s_id':s_id,"_token": "{{ csrf_token() }}"},
           success: function(result) {
           }
         });
      }
         $(this).parent().parent().remove();
     });
      $('#addmoreVariation').click(function(){
         $('span.myspan').append('<div style="align-items: end; margin-top: 20px;" class=row ><div class=col-md-10><div class=row><div class=col-md-3><label for=exampleInputPassword1>Select Size</label> <select class="form-control" name="size_id[]" required><option value="" selected="">Select One</option>@foreach($sizes as $size)<option value="{{$size->id}}">{{$size->size_name}} </option>@endforeach</select></div><div class=col-md-3><label for=exampleInputPassword1>Select Color</label> <select class="form-control" name="color_id[]" required><option value="" selected="">Select One</option>@foreach($colors as $color)<option value="{{$color->id}}">{{$color->color_name}} </option>@endforeach</select></div><div class=col-md-3><label for=exampleInputPassword1>Stock</label> <input class=form-control placeholder="Enter Stock" name="in_stock[]" required></div><div class=col-md-3><label for=exampleInputPassword1>Price</label> <input class=form-control placeholder="Enter Attribute Price" name="variation_price[]" required></div></div></div><div class=col-md-2><button class="btn btn-danger deleteVariation" data-vID="" type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.deleteVariation', function(){
     		 var v_id = $(this).attr('data-vID');
      if(v_id!=''){      	
      	$.ajax({
                url :"{{ route('delete-variation') }}",
                type : "post",
                data :{'v_id':v_id,"_token": "{{ csrf_token() }}"},
           success: function(result) {
           }
         });
      }
         $(this).parent().parent().remove();
     });
       $('#addmoreColor').click(function(){
         $('span.colorSpan').append('<div style="align-items: end; margin-top: 20px;" class=row ><div class=col-md-10><div class=row><div class=col-md-6><label for=exampleInputPassword1>Color Name</label> <select class="form-control" name="color_id[]" required><option value="" selected="">Select One</option>@foreach($colors as $color)<option value="{{$color->id}}" >{{$color->color_name}} </option>@endforeach</select></div></div></div><div class=col-md-2><button class="btn btn-danger deleteColor"type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.deleteColor', function(){
         $(this).parent().parent().remove();
     });
         $('#addmoreImg').click(function(){
         $('main.myImages').append('<div class=row style="align-items:center;"><div class=col-md-6><div class=form-group><label for=exampleInputPassword1>Gallery Images</label> <input class=form-control multiple name=images[] placeholder=""type=file></div></div><div class=col-md-2><button class="btn btn-danger deleteImg" data-imgID="" type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.deleteImg', function(){
      var img_id = $(this).attr('data-imgID');
      if(img_id!=''){      	
      	$.ajax({
                url :"{{ route('delete-image') }}",
                type : "post",
                data :{'img_id':img_id,"_token": "{{ csrf_token() }}"},
           success: function(result) {
           }
         });
      }
         $(this).parent().parent().remove();
     });
   });
   
   ColorImage.onchange = evt => {
   
     const [file] = ColorImage.files
     if (file) {
       colorImg.src = URL.createObjectURL(file)
     }
   }
</script>
<script>
   $(function () {
   	bsCustomFileInput.init();
   });
     $(document).ready(function () {  

              /*------------------------------------------
              --------------------------------------------
              master category Dropdown Change Event
              --------------------------------------------
              --------------------------------------------*/
              $('#master_category').on('change', function () {
                  var master_category_id = this.value;
                  var category_name = $('#master_category').find(":selected").text();
                	if( $.trim(category_name)==='Accessories'){
                	  $(".attribute").hide();
                	  $(".color").hide();
                	   $(".assessary_stock").show();
                	}else{
                		$(".attribute").show();
                		$(".color").show();
                		 $(".assessary_stock").hide();
                	}
                  $("#category").html('');
                  $.ajax({
                      url: "{{route('fetch-categories')}}",
                      type: "POST",
                      data: {
                          master_category_id: master_category_id,
                          _token: '{{csrf_token()}}'
                      },
                      dataType: 'json',
                      success: function (result) {
                          $('#category').html('<option value=""> Select Category </option>');
                          $.each(result.categories, function (key, value) {
                              $("#category").append('<option value="' + value
                                  .id + '">' + value.category_name + '</option>');
                          });
                          $('#sub_category').html('<option value="">Select Sub Category</option>');
                      }
                  });
              });
    
              /*------------------------------------------
              --------------------------------------------
              Category Dropdown Change Event
              --------------------------------------------
              --------------------------------------------*/
              $('#category').on('change', function () {
                  var category_id = this.value;
                  $("#sub_category").html('');
                  $.ajax({
                      url: "{{route('fetch-sub-categories')}}",
                      type: "POST",
                      data: {
                          category_id: category_id,
                          _token: '{{csrf_token()}}'
                      },
                      dataType: 'json',
                      success: function (res) {
                          $('#sub_category').html('<option value="">Select Sub Category</option>');
                          $.each(res.subcategories, function (key, value) {
                              $("#sub_category").append('<option value="' + value
                                  .id + '">' + value.subcategory_name + '</option>');
                          });
                      }
                  });
              });
    
          });
</script>
@include('admin::layouts.footer')
@include('admin::layouts.header')
@include('admin::layouts.sidebar')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Product</h1>
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
                     <h3 class="card-title">Add</h3>
                  </div>
                  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" required>
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
                                 <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">	
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Current Price</label>
                                 <input type="number" class="form-control" id="current_price" name="current_price" placeholder="Enter Current Price">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputFile">Previous Price</label>
                                 <input type="number" class="form-control" id="previous_price" name="previous_price" placeholder="Enter Previous Price">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Master Category</label>
                                 <select class="form-control" name="master_category_id" id="master_category" required>
                                    <option value="" selected="">Select Master Category </option>
                                    @foreach($masterCategories as $masterCategory)
                                    <option value="{{$masterCategory->id}}">{{$masterCategory->master_category_name}} </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1" required>Category</label>
                                 <select class="form-control" name="category_id" id="category" >
                                    <option value="" selected="">Select Category</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Sub Category</label>
                                 <select class="form-control" name="sub_category_id" id="sub_category">
                                    <option value="" selected="">Select Sub Category </option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Brand</label>
                                 <select class="form-control" name="brand_id" required>
                                    <option value="" selected="">Select One</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}} </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6" >
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Tax</label>
                                 <select class="form-control" name="tax">
                                    <option value="" selected="">Select One</option>
                                    <option value="1">High Tax</option>
                                    <option value="2">Low Tax</option>
                                    <option value="3">No Tax</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">SKU</label>
                                 <input type="text" class="form-control" placeholder=""  name="sku" />
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Video Link</label>
                                 <input type="text" class="form-control" placeholder=""  name="video_link"/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Featured Image</label>
                                 <input type="file" class="form-control" placeholder="" name="image"/>
                              </div>
                           </div>
                           <!--<div class="col-md-6">-->
                           <!--   <div class="form-group">-->
                           <!--      <label for="exampleInputPassword1">Gallery Images</label>-->
                           <!--      <input type="file" class="form-control" placeholder="" name="images[]" multiple/>-->
                           <!--   </div>-->
                           <!--</div>-->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Short Description</label>
                                 <textarea rows="5" class="form-control" placeholder="Description" name="short_description"></textarea>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Description</label>
                                 <textarea rows="5" class="form-control"  name="description"placeholder="Description"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 assessary_stock">
										<div class="form-group">
											<label for="exampleInputPassword1">Total in stock</label>
											<input type="number" class="form-control" placeholder="Total in stock" name="assessary_stock"/>
										</div>
						</div>
                        <div class="row"  style="align-items: center; border-top: 1px solid #cbcbcb; ">
                              <div class="col-md-6">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Gallery Images</label>
                                 <input type="file" class="form-control" placeholder="" name="images[]" multiple/>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <button type="button" class="btn btn-primary" id="addmoreimg"> Add More </button>
                           </div>
                        </div>
                         <main class="mymainimg">
                        </main>
                      
                        
                        <div class="row" style="align-items: end; border-top: 1px solid #cbcbcb; margin-top: 25px; padding-top: 25px;">
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label for="exampleInputPassword1">Specification Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Specification Name" name="specification_name[]" required/>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="exampleInputPassword1">Specification Description</label>
                                    <input type="text" class="form-control" placeholder="Enter Specification Description" name="specification_description[]" required/>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <button type="button" class="btn btn-primary" id="addmorebtn"> Add More </button>
                           </div>
                        </div>
                        <main class="mymain">
                        </main>
                        <div class="row attribute" style="align-items: end; border-top: 1px solid #cbcbcb; margin-top: 25px; padding-top: 25px;">
                           <div class="col-md-10">
                              <div class="row">
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Select Size</label>
                                    <select class="form-control" name="size_id[]" >
                                       <option value="" selected="">Select One</option>
                                       @foreach($sizes as $size)
                                       <option value="{{$size->id}}">{{$size->size_name}} </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Select Color </label>
                                    <select class="form-control" name="color_id[]" >
                                       <option value="" selected="">Select One</option>
                                       @foreach($colors as $color)
                                       <option value="{{$color->id}}">{{$color->color_name}} </option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Stock </label>
                                    <input type="text" class="form-control" placeholder="Enter Stock" name="in_stock[]" />
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputPassword1">Price </label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="variation_price[]" />
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <button type="button" class="btn btn-primary" id="addmoreAttribute"> Add More </button>
                           </div>
                        </div>
                        <span class="myspan">								    
                        </span>
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
     $('#addmorebtn').click(function(){
         $('main.mymain').append('<div style="align-items: end; margin-top: 20px;" class=row ><div class=col-md-10><div class=row><div class=col-md-6><label for=exampleInputPassword1>Specification Name</label> <input class=form-control placeholder="Enter Specification Name" name="specification_name[]" required></div><div class=col-md-6><label for=exampleInputPassword1>Specification Description</label> <input class=form-control placeholder="Enter Specification Description" name="specification_description[]" required></div></div></div><div class=col-md-2><button class="btn btn-danger delete"type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.delete', function(){
         $(this).parent().parent().remove();
     });
     $('#addmoreAttribute').click(function(){
         $('span.myspan').append('<div style="align-items: end; margin-top: 20px;" class=row ><div class=col-md-10><div class=row><div class=col-md-3><label for=exampleInputPassword1>Select Size</label> <select class="form-control" name="size_id[]" required><option value="" selected="">Select One</option>@foreach($sizes as $size)<option value="{{$size->id}}">{{$size->size_name}} </option>@endforeach</select></div><div class=col-md-3><label for=exampleInputPassword1>Select Color</label> <select class="form-control" name="color_id[]" required><option value="" selected="">Select One</option>@foreach($colors as $color)<option value="{{$color->id}}">{{$color->color_name}} </option>@endforeach</select></div><div class=col-md-3><label for=exampleInputPassword1>Stock</label> <input class=form-control placeholder="Enter Stock" name="in_stock[]" required></div><div class=col-md-3><label for=exampleInputPassword1>Price</label> <input class=form-control placeholder="Enter Attribute Price" name="variation_price[]" required></div></div></div><div class=col-md-2><button class="btn btn-danger deleteAttribute"type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.deleteAttribute', function(){
         $(this).parent().parent().remove();
     });
     $('#addmoreColor').click(function(){
         $('span.colorSpan').append('<div style="align-items: end; margin-top: 20px;" class=row ><div class=col-md-10><div class=row><div class=col-md-6><label for=exampleInputPassword1>Color Name</label> <select class="form-control" name="color_id[]" required><option value="" selected="">Select One</option>@foreach($colors as $color)<option value="{{$color->id}}">{{$color->color_name}} </option>@endforeach</select></div></div></div><div class=col-md-2><button class="btn btn-danger deleteAttribute"type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.deleteAttribute', function(){
         $(this).parent().parent().remove();
     });
     $('#addmoreimg').click(function(){
         $('main.mymainimg').append('<div class=row style="align-items:center;"><div class=col-md-6><div class=form-group><label for=exampleInputPassword1>Gallery Images</label> <input class=form-control multiple name=images[] placeholder=""type=file></div></div><div class=col-md-2><button class="btn btn-danger delete"type=button>Delete</button></div></div>');
     }); 
     $(document).on('click', '.delete', function(){
         $(this).parent().parent().remove();
     });
   });
</script>
<script>
   $(function () {
   	bsCustomFileInput.init();
   });
     $(document).ready(function () {  
     	$(".assessary_stock").hide();
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
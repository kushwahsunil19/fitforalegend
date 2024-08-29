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
                     <h3 class="card-title">Show</h3>
                  </div>
                  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <h6>{{ $product->product_name }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Slug</label>
                                 <h6> {{ $product->slug }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Current Price</label>
                                 <h6> {{ $product->current_price }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputFile">Previous Price</label>
                                 <h6> {{ $product->previous_price }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Master Category</label>
                                 <h6> {{ $masterCategory->master_category_name }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Category</label>
                                 <h6> {{ $category->category_name }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Sub Category</label>
                                 <h6> {{ $subcategory->subcategory_name }}  </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Brand</label>
                                 <h6> {{ $brand->brand_name}}</h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1"> Tax</label>
                                 <h6> {{ $product->tax }} </h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">SKU</label>
                                 <h6> {{ $product->sku }}</h6>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Video Link</label>
                                 <h6> {{ $product->video_link }} </h6>
                              </div>
                           </div>
                           @if($product->in_stock>0)
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Stock</label>
                                 <h6> {{ $product->in_stock }} </h6>
                              </div>
                           </div>
                           @endif
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Featured Image </label>
                                 <section class="uploadImg">
                                    <ul>
                                       <li> <img src="{{asset("public/uploads/products/$product->image")}}"> </li>
                                    </ul>
                                 </section>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Gallery Images
                                 </label>
                                 <section class="uploadImg">
                                    <ul>
                                       @if(!empty($product->ProductImages))
                                       @foreach ($product->ProductImages as $key => $image)
                                       <li> <img src="{{asset("public/uploads/products/$image->images")}}"> </li>
                                       @endforeach
                                       @endif
                                    </ul>
                                 </section>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Short Description</label>
                                 <h6> {{ $product->short_description }} </h6>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Description</label>
                                 <h6>  {{ $product->description }} </h6>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Colors</label>
                                 <h6>@if(!empty($colors)) @foreach($colors as $color) {{ $color->color_name }},  @endforeach @endif</h6>
                              </div>
                           </div>
                        </div>
                        <div class="specific_sec">
                           <h3 style="margin-bottom: 15px; font-size: 22px; font-weight: 800;"> Specific Data List </h3>
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($product->productSpecification as $key => $spacification)
                                 <tr>
                                    <td>{{ $spacification->specification_name }}</td>
                                    <td>{{ $spacification->specification_description }}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                        <div class="specific_sec">
                           <h3 style="margin-bottom: 15px; font-size: 22px; font-weight: 800;"> Attribute Data List </h3>
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>Color Name</th>
                                    <th>Size Name</th>
                                    <th>Price</th>
                                    <th>In stock</th>
                                    <th>Used Stock</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($product->productVariation as $key => $variation)
                                 <tr>
                                    <td>{{ $variation->size_id }}</td>
                                    <td>{{ $variation->size_id }}</td>
                                    <td>${{ $variation->variation_price }}</td>
                                    <td>{{ $variation->in_stock }}</td>
                                    <td>{{ $variation->used_stock }}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     
                        <span>								    
                        </span>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script src="{{asset('public/assets/plugins/jquery/jquery.min.js')}}"></script>

@include('admin::layouts.footer')
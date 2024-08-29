
@include('admin::layouts.header')
@include('admin::layouts.sidebar')



<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Coupon</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Coupon</li>
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
						<form action="{{ route('coupons.update',$coupon->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Code</label>
											<input type="text" class="form-control" id="code" name="code" placeholder="Enter Name" value="{{$coupon->code}}">
											@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										</div>
										<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Discount</label>
											<input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount" value="{{$coupon->discount}}">	
										</div>
									</div>
									
								</div>
								<div class="row">
										<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Expiry Date</label>
											<input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date" value="{{$coupon->expiry_date}}">	
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										<div class="form-group">
											<label for="exampleInputPassword1">Status</label>
											<select name="status" class="form-control">
												<option value="Active" @if($coupon->status =='Active') selected @endif>Active</option>
												<option value="Deactive" @if($coupon->status =='Deactive') selected @endif>Deactive</option>
											</select>
										</div>
											
										</div>										
									</div>

								</div>
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

@include('admin::layouts.footer')
<script src="{{asset('public/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
	$(function () {
		bsCustomFileInput.init();
	});
</script>
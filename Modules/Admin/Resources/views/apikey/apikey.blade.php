
@include('admin::layouts.header')
@include('admin::layouts.sidebar')



<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Api Keys</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Api Keys</li>
					</ol>

				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				
				
					
				<div class="col-md-12">
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
					<div class="card">
						<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link active" href="#Stripe" data-toggle="tab">Stripe</a></li>
								<li class="nav-item"><a class="nav-link" href="#GoogleMapApiKey" data-toggle="tab">Google Map Api Key</a></li>
								<li class="nav-item"><a class="nav-link" href="#EmailSetting" data-toggle="tab">Email Setting</a></li>
							</ul>
						</div>
						<div class="card-body">
							<form action="{{route('api-keys')}}" method="post">
								@csrf
							<div class="tab-content">

								<div class="active tab-pane" id="Stripe">

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Public Key</label>
												<input type="hidden" value="@if(isset($apikey->id)){{ $apikey->id}}@endif" name="id">
												<input type="text" class="form-control" id="stripe_public_key" name="stripe_public_key" placeholder="Enter Public Key" value="@if(isset($apikey->stripe_public_key)){{ $apikey->stripe_public_key}}@endif">								 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Secret Key</label>
												<input type="text" class="form-control" id="stripe_secret_key" name="stripe_secret_key" placeholder="Enter Secret Key" value="@if(isset($apikey->stripe_secret_key)){{ $apikey->stripe_secret_key}}@endif">
											</div>
										</div>
									</div>

								</div>

								<div class="tab-pane" id="GoogleMapApiKey">

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Api Key</label>
												<input type="text" class="form-control" id="google_map_key" name="google_map_key" placeholder="Enter Api Key" value="@if(isset($apikey->google_map_key)){{ $apikey->google_map_key}}@endif">								 
											</div>
										</div>
										<!-- <div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
										</div>
									</div> -->
								</div>
							</div>

							<div class="tab-pane" id="EmailSetting">
								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="@if(isset($apikey->email)){{ $apikey->email}}@endif">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Password</label>
											<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" value="@if(isset($apikey->password)){{ $apikey->password}}@endif">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-danger">Submit</button>

								</div>
							</div>
							</form>
						</div>
					
					</div>
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

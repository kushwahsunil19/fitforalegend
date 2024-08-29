
@include('admin::layouts.header')
@include('admin::layouts.sidebar')



<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Panel Setting</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Panel Setting</li>
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
								<li class="nav-item"><a class="nav-link active" href="#ChangePassword" data-toggle="tab">Change Password</a></li>
								<li class="nav-item"><a class="nav-link" href="#ChangeLogo" data-toggle="tab">Change Logo</a></li>
								<li class="nav-item"><a class="nav-link" href="#ChangeLoginEmail" data-toggle="tab">Change Login Email</a></li>
							</ul>
						</div>
						<div class="card-body">
							<form action="{{route('panel-setting')}}" method="post" enctype="multipart/form-data">
								@csrf
							<div class="tab-content">
								<div class="active tab-pane" id="ChangePassword">

								<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Password</label>
												<input type="hidden" value="{{ $user->id}}" name="id">
												<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" value="">								 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Confirm Password</label>
												<input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" value="">
											</div>
										</div>
									</div>	

								</div>

								<div class="tab-pane" id="ChangeLogo">

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Logo</label>

											<div class="input-group">
												<div class="custom-file">
													<input type="file" name="image" class="custom-file-input" id="image">
													<label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
												<div class="input-group-append">
													<span class="input-group-text">Upload</span>
												</div>
											</div>							 
											</div>
										</div>
										
									</div>	
								</div>

								<div class="tab-pane" id="ChangeLoginEmail">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Email Address</label>									
												<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user->email}}">								 
											</div>
										</div>
										
									</div>	
								</div>
								<div class="form-group row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-danger">Submit</button>

								</div>
							</div>

							</div>
						</form>

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

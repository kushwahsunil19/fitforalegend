
@include('admin::layouts.header')
@include('admin::layouts.sidebar')



<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Users</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User</li>
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
						<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Name</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
											@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Password">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Phone</label>
											<input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputFile">File input</label>
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

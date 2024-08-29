
@include('admin::layouts.header')
@include('admin::layouts.sidebar')



<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Color</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Color</li>
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
						<form action="{{ route('colors.update',$color->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Color Name</label>
											<input type="text" class="form-control" id="color_name" name="color_name" placeholder="Enter Color Name" value="{{ $color->color_name }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Color Code</label>
											<input type="color" class="form-control" id="color_code" name="color_code" placeholder="Enter Color Code" value="{{ $color->color_code }}">
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
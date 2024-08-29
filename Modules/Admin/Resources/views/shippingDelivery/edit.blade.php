
@include('admin::layouts.header')

@include('admin::layouts.sidebar')



<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Shipping and delivery</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Shipping and delivery</li>
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
						<form action="{{ route('shipping-delivery.update',$about->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Title</label>
											<input type="text" class="form-control" id="title" name="title" placeholder="Enter Size Name" value="{{ $about->title }}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Description</label>
                                                    <textarea id="editor" name="description" class="form-control" rows="5">{{ $about->description }}
                                                    </textarea>
											
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


 <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor', {});
</script>
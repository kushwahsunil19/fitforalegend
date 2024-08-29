
	@include('admin::layouts.header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"/>
 	<link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"/>
 	 <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.cs')}}"/>
 


			@include('admin::layouts.sidebar')

			<div class="content-wrapper">

				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Colors</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Colors</li>
								</ol>
							</div>
						</div>
					</div>
				</section>

				<section class="content">
					<div class="container-fluid">

						<div class="row">
							<div class="col-12">
							

								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Colors</h3>
										<a href="{{route('colors.create')}}" class="btn btn-success float-right">Create new Color</a>
									</div>

									<div class="card-body">
											<table class="table table-bordered yajra-datatable">
												<thead>
												<tr>
												<th>No</th>
												<th>Color Name</th>
												<th>Color Code</th>
												<th>Action</th>
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
									</div>

								</div>

							</div>

						</div>

					</div>

				</section>

			</div>
@include('admin::layouts.footer')	
<script src="{{asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('colors.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},          
            {data: 'color_name', name: 'color_name'},
            {data: 'color_code', name: 'color_code'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
  
   function deleted(e) {
    var url = '{{ route("colors.destroy", ":id") }}';
        url = url.replace(':id', e);     
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
     if (confirm("Are You sure want to delete this master color!") == true) {
              $.ajax({
                  url    : url,
                  type   : "delete",
                  success: function(data) {
                    $('.yajra-datatable').DataTable().ajax.reload();
                  }
              })
          }
         
     
  }
</script>

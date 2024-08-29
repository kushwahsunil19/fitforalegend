
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
								<h1> Coupons</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Coupons</li>
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
										<h3 class="card-title">Coupons</h3>
										<a href="{{route('coupons.create')}}" class="btn btn-success float-right">Create new Coupon</a>
									</div>

									<div class="card-body">
											<table class="table table-bordered yajra-datatable">
												<thead>
												<tr>
												<th>No</th>
												<th>Code</th>
												<th>Discount(%)</th>
												<th>Expiry date</th>
												<th>Status</th>							
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
        ajax: "{{ route('coupons.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'code', name: 'code'},
            {data: 'discount', name: 'discount'},  
            {data: 'expiry_date', name: 'expiry_date'},
            {data: 'status', name: 'status'},         
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
    var url = '{{ route("coupons.destroy", ":id") }}';
        url = url.replace(':id', e);     
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
     if (confirm("Are You sure want to delete this coupon!") == true) {
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

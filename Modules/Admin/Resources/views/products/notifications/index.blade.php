
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
								<h1> Notifications</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Notifications</li>
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
									<h3 class="card-title">Notifications</h3>	
									</div>

									<div class="card-body" style="overflow: auto">
											<table class="table table-bordered yajra-datatable">
												<thead>
												<tr>
												<th>No</th>
												
												<th>User Name</th>
												<th>Payment type</th>
												<th>Transaction Id</th>
												<th>Address</th>
												<th>Date</th>
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
        ajax: "{{ route('all-notifications') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           
            {data: 'user', name: 'user'},  
            {data: 'payment_type', name: 'payment_type'},
            {data: 'transaction_id', name: 'transaction_id'},
            {data: 'address1', name: 'address1'},
             {data: 'created_at', name: 'created_at'},
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
    var url = '{{ route("orders.destroy", ":id") }}';
        url = url.replace(':id', e);     
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
     if (confirm("Are You sure want to delete this order!") == true) {
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

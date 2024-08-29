
	@include('admin::layouts.header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"/>
<!--  	<link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"/>
 	 <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.cs')}}"/> -->
 


			@include('admin::layouts.sidebar')

			<div class="content-wrapper">

				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">All</li>
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
									<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link active" href="#Events" data-toggle="tab">Events</a></li>
								<li class="nav-item"><a class="nav-link" href="#Places" data-toggle="tab">Places</a></li>
								<li class="nav-item"><a class="nav-link" href="#Experiences" data-toggle="tab">Experiences</a></li>
								<li class="nav-item"><a class="nav-link" href="#Itineraries" data-toggle="tab">Itineraries</a></li>
							</ul>
						</div>
						<div class="card-body">
							
							<div class="tab-content">
								<div class="active tab-pane" id="Events">

								<div class="row">
									<div class="card-body">
											<table class="table table-bordered yajra-datatable-events">
												<thead>
												<tr>
												<th>No</th>
												<th>Image</th>
												<th>Event Name</th>
												<th>Lat</th>               
												<th>Long</th>
												<th>Event Location</th>
												<th>Event date</th>
												<th>Event Time</th>
												<th>Contact Person Name</th>	
												<th>Contact</th>	
												<th>Description</th>			
												
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
									</div>
									</div>	

								</div>

								<div class="tab-pane" id="Places">

									<div class="row">
										<div class="card-body">
											<table class="table table-bordered yajra-datatable-place">
												<thead>
												<tr>
												<th>No</th>
												<th>Image</th>
												<th>Place Name</th>
												<th>Lat </th>               
												<th>Long</th>
												<th>Place Location</th>				
												<th>Description</th>
												
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
									</div>
										
									</div>	
								</div>

								<div class="tab-pane" id="Experiences">
									<div class="row">
										<div class="card-body">
											<table class="table table-bordered yajra-datatable-Experience">
												<thead>
												<tr>
												<th>No</th>
												<th>Image</th>
												<th>Experience Name</th>
												<th>Lat</th>               
												<th>Long</th>
												<th>Experience Location</th>
												<th>Description</th>
												
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										
									</div>	
								</div>
								<div class="tab-pane" id="Itineraries">
									<div class="row">
										<div class="card-body">
											<table class="table table-bordered yajra-datatable-Itineraries">
												<thead>
												<tr>
												<th>No</th>
												<th>Image</th>
												<th>Itinerary Name</th>
												<th>Lat</th>               
												<th>Long</th>
												<th>Itinerary Location</th>	
													
												
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
    var userId = "<?php echo $data['id']?>";
    var table = $('.yajra-datatable-events').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('user.events') }}",
          data: function (d) {
                d.userId = userId
            }
        },
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'event_name', name: 'event_name'},
            {data: 'lat', name: 'lat'},           
            {data: 'long', name: 'long'},
            {data: 'event_location', name: 'event_location'},
            {data: 'event_date', name: 'event_date'},
            {data: 'event_time', name: 'event_time'},
            {data: 'contact_person_name', name: 'contact_person_name'},
            {data: 'contact', name: 'contact'},
            {data: 'description', name: 'description'},
            
        ]
    });


       var table = $('.yajra-datatable-place').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('user.places') }}",
          data: function (d) {
                d.userId = userId
            }
        },
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'place_name', name: 'place_name'},
            {data: 'lat', name: 'lat'},           
            {data: 'long', name: 'long'},
            {data: 'place_location', name: 'place_location'},
            {data: 'description', name: 'description'},
            
        ]
    });

          var table = $('.yajra-datatable-Itineraries').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('user.itineraries') }}",
          data: function (d) {
                d.userId = userId
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'itinerary_name', name: 'itinerary_name'},
            {data: 'lat', name: 'lat'},           
            {data: 'long', name: 'long'},
            {data: 'itinerary_location', name: 'itinerary_location'},
           
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

   var table = $('.yajra-datatable-Experience').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('user.experiences') }}",
          data: function (d) {
                d.userId = userId
            }
        },
        columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'experience_name', name: 'experience_name'},
            {data: 'lat', name: 'lat'},           
            {data: 'long', name: 'long'},
            {data: 'experience_location', name: 'experience_location'},
            {data: 'description', name: 'description'},
           
           
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
 
   
  
  });

  $('body').on('click', '.delete', function () {
 $.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
   if (confirm("Delete Record?") == true) {
    var id = $(this).data('id');
    
    // ajax
    $.ajax({
        type:"POST",
        url: "",
        data: { id: id},
        dataType: 'json',
        success: function(res){
 
          var oTable = $('.yajra-datatable').dataTable();
          oTable.fnDraw(false);
       }
    });
   }
 
 });
</script>

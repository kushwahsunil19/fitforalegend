
@extends('admin::layouts.loginMaster')
@include('admin::layouts.header')
@include('admin::layouts.sidebar')

<style>
.info-box .info-box-number {
    display: block;
    margin-top: 0;
    font-weight: 700;
    font-size: 25px;
    line-height: normal;
}
.info-box{
    padding: 15px 10px !important;
}
</style>

<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div>
			</div>
		</div>
	</div>


	<section class="content">
		<div class="container-fluid">
  
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box"> <span class="info-box-icon bg-info elevation-1"><i class="fas fa-object-group"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Orders</span> <span class="info-box-number"> {{$totalOrders}} </span> </div>
                    </div>
                </div>
              <!--  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Pending Orders</span> <span class="info-box-number">{{$pendingOrders}}</span> </div>
                    </div>
                </div>-->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Delivered Orders</span> <span class="info-box-number">{{$deliveredOrders}}</span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-window-close"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Canceled Orders</span> <span class="info-box-number">{{ $canceledOrders}}</span> </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box"> <span class="info-box-icon bg-info elevation-1"><i class="fab fa-product-hunt"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Product Sale</span> <span class="info-box-number">{{$thisMonthSale}} </span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Today Product Order</span> <span class="info-box-number">{{$todayProductOrder}}</span> </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">This Month Sale</span> <span class="info-box-number">{{$thisMonthSale}}</span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">This Year Product Sale</span> <span class="info-box-number">{{$thisYearProductSale}}</span> </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box"> <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Earning</span> <span class="info-box-number"> ${{$totalEarning}} </span> </div>
                    </div>
                </div>
                <!--<div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Today Pending Earning</span> <span class="info-box-number">${{$todayPendingEarning}}</span> </div>
                    </div>
                </div>-->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">This Month Earning</span> <span class="info-box-number">${{ $thisMonthEarning}}</span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">This Year Erning</span> <span class="info-box-number">${{$thisYearEarning}}</span> </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box"> <span class="info-box-icon bg-info elevation-1"><i class="fab fa-product-hunt"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Products</span> <span class="info-box-number">{{$totalProducts}} </span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Customers</span> <span class="info-box-number">{{ $totalCustomers}}</span> </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-table"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total MasterCategories</span> <span class="info-box-number">{{$totalMasterCategories}}</span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-table"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Categories</span> <span class="info-box-number">{{$totalCategories}}</span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-table"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total SubCategories</span> <span class="info-box-number">{{$totalCategories}}</span> </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3"> <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content"> <span class="info-box-text">Total Brands</span> <span class="info-box-number">{{$totalSubCategories}}</span> </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Recent Orders
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Order ID</th>
                                            <th>Payment Method</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($orders))
                                        @foreach($orders as $order)
                                        <tr>
                                            <td><a href="">{{$order->user->first_name}} {{$order->user->last_name}}</a></td>
                                            <td><span class="badge badge-success">{{$order->id}}</span></td>
                                            <td>{{$order->payment_type}}</td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">${{ $order->total_amount }}</div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                                <span>
                                    <i class="far fa-chart-bar"></i>
                                    Bar Chart
                                </span>
                                <span>
                                    <select class="form-control" id="year">
                                        <option value=""> -Select year- </option>
                                     
                                        <option value="2023"> 2023 </option>
                                        <option value="2022"> 2022 </option>
                                        <option value="2021"> 2021 </option>
                                    </select>
                                </span>
                            </h3>
                        </div>
                        <div class="card-body new_html">
                            <!--<div id="bar-chart" style="height: 300px;"></div>-->
                        <div><canvas id="myChart"></canvas></div> 
                    
                            
                             
                        </div>
                    </div>
                </div>
            </div>
            
		</div>
	</section>

</div>


@include('admin::layouts.footer')

<script src="https://adminlte.io/themes/v3/plugins/flot/jquery.flot.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/flot/plugins/jquery.flot.resize.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/flot/plugins/jquery.flot.pie.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.flot/0.8.4/jquery.flot.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 

<script>


    // var bar_data = {
    //   data : [[1,{{ $janEarning}}], [2,{{ $febEarning}}], [3,{{ $marEarning}}], [4,{{ $aprEarning}}], [5,{{ $mayEarning}}], [6,{{ $junEarning}}], [7,{{ $julEarning}}], [8,{{ $augEarning}}], [9,{{ $sepEarning}}], [10,{{ $octEarning}}], [11,{{ $novEarning}}], [12,{{ $decEarning}}]],
    //   bars: { show: true },
     
    // }
 
    // $.plot('#bar-chart', [bar_data], {
    //   grid  : {
    //     borderWidth: 1,
    //     borderColor: '#f3f3f3',
    //     tickColor  : '#f3f3f3'
    //   },
    //   series: {
    //      bars: {
    //       show: true, barWidth: 0.5, align: 'center',
    //     },
    //   },
    //   colors: ['#3c8dbc'],
    //   xaxis : {
    //     ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June'], [7,'July'], [8,'August'], [9,'September'], [10,'October'], [11,'November'], [12,'December']]
    //   },
       
     
    // })
    
    // $(document).ready(function()
    // {
    //           $("#year").change(function()
    //           {
    //           var year = $(this).val();
           
    //           });
    // });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["january", "february", "march", "april", "may", "june", "july", "august", "september", "octomber", "november", "december"],
    datasets: [{
      label: '',
      data: [{{ $janEarning}}, {{ $febEarning}},{{ $marEarning}}, {{ $aprEarning}}, {{ $mayEarning}}, {{ $junEarning}}, {{ $julEarning}},{{ $augEarning}}, {{ $sepEarning}}, {{ $octEarning}}, {{ $novEarning}}, {{ $decEarning}}],
      backgroundColor: "#17c6aa"
    }]
  }
});
 $(document).ready(function()
     {
           $("#year").change(function(){
                var year = $(this).val();
                 $.ajax({
                      url: "{{route('dashboard.store')}}",
                      type: "POST",
                      data: {
                          year: year,
                          _token: '{{csrf_token()}}'
                      },
                      dataType: 'json',
                      success: function (result) {
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: ["january", "february", "march", "april", "may", "june", "july", "august", "september", "octomber", "november", "december"],
                    datasets: [{
                      label: '',
                      data: [result.jan, result.feb,result.mar, result.apr, result.may, result.jun, result.jul,result.aug, result.sep, result.oct, result.nov, result.dec],
                      backgroundColor: "#17c6aa"
                    }]
                  }
                });
                      }
                  });
               
           
           });
     });
</script>




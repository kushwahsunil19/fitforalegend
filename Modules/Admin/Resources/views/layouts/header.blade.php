<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Sep 2023 10:36:57 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fitforalegend</title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
	<link rel="stylesheet" href="{{asset('public/assets/plugins/fontawesome-free/css/all.min.css')}}">

	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<link rel="stylesheet" href="{{asset('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

	<link rel="stylesheet" href="{{asset('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

	<link rel="stylesheet" href="{{asset('public/assets/plugins/jqvmap/jqvmap.min.css')}}">

	<link rel="stylesheet" href="{{asset('public/assets/dist/css/adminlte.min2167.css?v=3.2.0')}}">

	<link rel="stylesheet" href="{{asset('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

	<link rel="stylesheet" href="{{asset('public/assets/plugins/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{asset('public/assets/dist/css/custom.css')}}">

	<link rel="stylesheet" href="{{asset('public/assets/plugins/summernote/summernote-bs4.min.css')}}">
	<script nonce="2b943425-2022-4dfb-8aee-5f7076ec2a93">(function(w,d){!function(bg,bh,bi,bj){bg[bi]=bg[bi]||{};bg[bi].executed=[];bg.zaraz={deferred:[],listeners:[]};bg.zaraz.q=[];bg.zaraz._f=function(bk){return async function(){var bl=Array.prototype.slice.call(arguments);bg.zaraz.q.push({m:bk,a:bl})}};for(const bm of["track","set","debug"])bg.zaraz[bm]=bg.zaraz._f(bm);bg.zaraz.init=()=>{var bn=bh.getElementsByTagName(bj)[0],bo=bh.createElement(bj),bp=bh.getElementsByTagName("title")[0];bp&&(bg[bi].t=bh.getElementsByTagName("title")[0].text);bg[bi].x=Math.random();bg[bi].w=bg.screen.width;bg[bi].h=bg.screen.height;bg[bi].j=bg.innerHeight;bg[bi].e=bg.innerWidth;bg[bi].l=bg.location.href;bg[bi].r=bh.referrer;bg[bi].k=bg.screen.colorDepth;bg[bi].n=bh.characterSet;bg[bi].o=(new Date).getTimezoneOffset();if(bg.dataLayer)for(const bt of Object.entries(Object.entries(dataLayer).reduce(((bu,bv)=>({...bu[1],...bv[1]})),{})))zaraz.set(bt[0],bt[1],{scope:"page"});bg[bi].q=[];for(;bg.zaraz.q.length;){const bw=bg.zaraz.q.shift();bg[bi].q.push(bw)}bo.defer=!0;for(const bx of[localStorage,sessionStorage])Object.keys(bx||{}).filter((bz=>bz.startsWith("_zaraz_"))).forEach((by=>{try{bg[bi]["z_"+by.slice(7)]=JSON.parse(bx.getItem(by))}catch{bg[bi]["z_"+by.slice(7)]=bx.getItem(by)}}));bo.referrerPolicy="origin";bo.src="https://adminlte.io/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bg[bi])));bn.parentNode.insertBefore(bo,bn)};["complete","interactive"].includes(bh.readyState)?zaraz.init():bg.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
	
	<style>
	   .navbar-expand .navbar-nav .dropdown-menu {
    position: absolute;
    max-height: 450px;
    overflow: auto;
    max-width: 450px;
    min-width: 300px;
} 
.navbar-badge {
    font-size: .6rem;
    font-weight: 300;
    padding: 2px 4px;
    position: absolute;
    right: 23px;
    top: 5px;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    line-height: 14px;
    font-weight: 500;
}	</style>
	
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

			<div class="preloader flex-column justify-content-center align-items-center">
				<img class="animation__shake" src="{{asset('public/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
			</div>

			<nav class="main-header navbar navbar-expand navbar-white navbar-light">

				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
					<!--<li class="nav-item d-none d-sm-inline-block">-->
					<!--	<a href="{{route('dashboard.index')}}" class="nav-link">Home</a>-->
					<!--</li>-->
					<!--<li class="nav-item d-none d-sm-inline-block">-->
					<!--	<a href="#" class="nav-link">Contact</a>-->
					<!--</li>-->
					<!--<li class="nav-item d-none d-sm-inline-block">-->
					<!--	<a href="{{ route('logout') }}" class="nav-link">Logout</a>-->
					<!--</li>-->
					<!-- <ul class="dropdown-menu">-->
     <!--                   <li><a class="dropdown-item" href="{{ route('logout') }}"-->
     <!--                       onclick="event.preventDefault();-->
     <!--                       document.getElementById('logout-form').submit();"-->
     <!--                       >Logout</a>-->
     <!--                       <form id="logout-form" action="{{ route('logout') }}" method="POST">-->
     <!--                           @csrf-->
     <!--                       </form>-->
     <!--                   </li>-->
     <!--                   </ul>-->
				</ul>

				<ul class="navbar-nav ml-auto">

					<!--<li class="nav-item">-->
					<!--	<a class="nav-link" data-widget="navbar-search" href="#" role="button">-->
					<!--		<i class="fas fa-search"></i>-->
					<!--	</a>-->
					<!--	<div class="navbar-search-block">-->
					<!--		<form class="form-inline">-->
					<!--			<div class="input-group input-group-sm">-->
					<!--				<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">-->
					<!--				<div class="input-group-append">-->
					<!--					<button class="btn btn-navbar" type="submit">-->
					<!--						<i class="fas fa-search"></i>-->
					<!--					</button>-->
					<!--					<button class="btn btn-navbar" type="button" data-widget="navbar-search">-->
					<!--						<i class="fas fa-times"></i>-->
					<!--					</button>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</form>-->
					<!--	</div>-->
					<!--</li>-->

					<!--<li class="nav-item dropdown">-->
					<!--	<a class="nav-link" data-toggle="dropdown" href="#">-->
					<!--		<i class="far fa-comments"></i>-->
					<!--		<span class="badge badge-danger navbar-badge">3</span>-->
					<!--	</a>-->
					<!--	<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
					<!--		<a href="#" class="dropdown-item">-->

					<!--			<div class="media">-->
					<!--				<img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">-->
					<!--				<div class="media-body">-->
					<!--					<h3 class="dropdown-item-title">-->
					<!--						Brad Diesel-->
					<!--						<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>-->
					<!--					</h3>-->
					<!--					<p class="text-sm">Call me whenever you can...</p>-->
					<!--					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
					<!--				</div>-->
					<!--			</div>-->

					<!--		</a>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item">-->

					<!--			<div class="media">-->
					<!--				<img src="{{asset('public/assets/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">-->
					<!--				<div class="media-body">-->
					<!--					<h3 class="dropdown-item-title">-->
					<!--						John Pierce-->
					<!--						<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>-->
					<!--					</h3>-->
					<!--					<p class="text-sm">I got your message bro</p>-->
					<!--					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
					<!--				</div>-->
					<!--			</div>-->

					<!--		</a>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item">-->

					<!--			<div class="media">-->
					<!--				<img src="{{asset('public/assets/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">-->
					<!--				<div class="media-body">-->
					<!--					<h3 class="dropdown-item-title">-->
					<!--						Nora Silvester-->
					<!--						<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>-->
					<!--					</h3>-->
					<!--					<p class="text-sm">The subject goes here</p>-->
					<!--					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
					<!--				</div>-->
					<!--			</div>-->

					<!--		</a>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>-->
					<!--	</div>-->
					<!--</li>-->

					<!--<li class="nav-item dropdown">-->
					<!--	<a class="nav-link" data-toggle="dropdown" href="#">-->
					<!--		<i class="far fa-bell"></i>-->
					<!--		<span class="badge badge-warning navbar-badge">15</span>-->
					<!--	</a>-->
					<!--	<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
					<!--		<span class="dropdown-item dropdown-header">15 Notifications</span>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item">-->
					<!--			<i class="fas fa-envelope mr-2"></i> 4 new messages-->
					<!--			<span class="float-right text-muted text-sm">3 mins</span>-->
					<!--		</a>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item">-->
					<!--			<i class="fas fa-users mr-2"></i> 8 friend requests-->
					<!--			<span class="float-right text-muted text-sm">12 hours</span>-->
					<!--		</a>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item">-->
					<!--			<i class="fas fa-file mr-2"></i> 3 new reports-->
					<!--			<span class="float-right text-muted text-sm">2 days</span>-->
					<!--		</a>-->
					<!--		<div class="dropdown-divider"></div>-->
					<!--		<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
					<!--	</div>-->
					<!--</li>-->
					<!--<li class="nav-item">-->
					<!--	<a class="nav-link" data-widget="fullscreen" href="#" role="button">-->
					<!--		<i class="fas fa-expand-arrows-alt"></i>-->
					<!--	</a>-->
					<!--</li>-->
					<li class="nav-item dropdown notify">
					 
                       <a class="nav-link notification_count" data-toggle="dropdown"  style="background: transparent;">
                       <i class="far fa-bell" style="color: #000;font-size: 27px; margin-right: 15px;"></i>
                       <span class="badge badge-warning navbar-badge orderCount" style=" right: 23px;top: 5px; height: 18px; width: 18px; border-radius: 50%; line-height: 14px;font-weight: 500;">{{count(getOrderNotification())}}</span>
                       </a>
                       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <span class="dropdown-item dropdown-header orderheaderCount">{{count(getOrderNotification())}} Notifications</span>
                          <div class="dropdown-divider"></div>
                          <div id="notificatins" class="notify"></div>
                          <!--@if(count(getOrderNotification()))
                          @foreach(getOrderNotification() as $key =>$order)
                          <a href="{{route('orders.show',$order->id)}}" class="dropdown-item">
                          <i class="fas fa-envelope mr-2"></i> New Order
                          <span class="float-right text-muted text-sm">{{ date('D,MY', strtotime($order->created_at)) }} &nbsp; {{ date('H:i:s', strtotime($order->created_at)) }}</span>
                          </a>
                          <div class="dropdown-divider"></div>
                          @endforeach
                          @endif-->
                         
                          <a href="{{ route('all-notifications')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
                       </div>
                    </li>
                   
					<li class="nav-item">
						<a href="{{ route('logout') }}" class="nav-link bg-danger">Logout</a>
					</li>
				</ul>
			</nav>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
<script>
 /*setInterval(function(){
    //  $(document).ready(function(){
        $("#notificatins").empty();
    // });
 });*/
    setInterval(function(){
    /*$("#notificatins").empty();*/
      $.ajax({
               url    :"{{ route('all-notification') }}",
               type   : "get",
               success: function(data) { 
                $('.orderCount').text(data.orderCount);
                $('.orderheaderCount').text(data.orderCount+ ' Notifications');
               /* var html ='';
                 $.each(data.orders, function (key, value) {
                            var url = '{{ route("orders.show", ":id") }}';
                            url = url.replace(':id', value.id); 
                            var d = new Date(value.created_at);
                            let hrs = d.getHours();
                            let m = d.getMinutes();
                            // Condition to add zero before minute
                            let min = m < 10 ? `0${m}` : m;
                            const currTime = hrs >= 12 ? `${hrs - 12}:${min} pm` : `${hrs}:${min} am`;
                            var html ='<a href="'+url+'" class="dropdown-item"><i class="fas fa-envelope mr-2"></i> New Order<span class="float-right text-muted text-sm">'+currTime+'</span></a><div class="dropdown-divider"></div>';
                              $("#notificatins").append(html);
                          });*/
                          
                          
                        
                          
               }

              })
        },5000);
    
     
  
</script>
			

<style>
label {
    display: block;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
}
.uploadImg{
    width: 100%;
    background: none;
    padding: 0px;
}
.uploadImg ul{
    margin:0px;
    padding: 0px;
    list-style: none;
    display: flex;
}
.uploadImg li{
    float: none;
    margin-right: 10px;
}
.uploadImg li img {
    width: 150px;
    border: 1px solid #c7c3c3;
    padding: 2px;
    height: 150px;
    background: #fff;
    object-fit: cover;
    object-position: left;
}.form-group {
    margin-bottom: 30px;
}
.specific_sec{
    width: 100%;
    background: none;
    padding: 25px 0px;
}
.table thead th {
    background: #333a40;
    color: #fff;
}
</style>




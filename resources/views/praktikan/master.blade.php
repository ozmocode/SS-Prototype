<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>XploITS | Vulnerability Research Center</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />

	<!--  Paper Dashboard core CSS    -->
	<link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet" />


	<!--  Fonts and icons     -->
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">

</head>

<body>

	<div class="wrapper">
		<div class="sidebar" data-background-color="white" data-active-color="danger">

			<!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

	{{-- @if (Auth::check()&&Auth::user()->role_id = 1){
			@include('dashboard.sidebar')
}else{
	@include('user.sidebar')
}
@endif --}}
@include('praktikan.sidebar')

		<div class="main-panel">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
						<a class="navbar-brand" href="#">Dashboard</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-panel"></i>
                                    <p class="notification">|</p>
									<p>{{Auth::user()->name}}</p>
									<b class="caret"></b>
                              </a>
								<ul class="dropdown-menu">
									<li><a href="/logout">Logout</a></li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</nav>

      <div class="content">
        <div class="container-fluid">
          @yield('content')

        </div>
      </div>


			@include('praktikan.footer')

		</div>
	</div>


</body>

<!--   Core JS Files   -->
<script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{asset('js/bootstrap-checkbox-radio.js')}}"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>


</html>

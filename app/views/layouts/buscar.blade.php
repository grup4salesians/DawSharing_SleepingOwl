<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Default Content title')</title>
		@include('includes.head')
                @include ('includes\headapigoogle')
	</head>
	<body>
		<!--header starts-->
		<div class="header">
			@include('includes.header')
			<div id="map_canvas" class="banner">
			    <div class="banner-info text-center">
			        <h1>@yield('subtitle', 'Default Content subtitle')</h1>
			        <span></span>
			    </div>
			</div>
		</div>
		<!-- buscar -->
		<div class="online_reservation">
			@include('includes.buscar')	  
		</div> 

		@yield('content')
		
		<!---->
		<div class="fotter">
			@include('includes.footer')
		</div>
		<!---->
		<div class="fotter-info">
			@include('includes.footer-info')
		</div>
		<!---->

	</body>
</html>
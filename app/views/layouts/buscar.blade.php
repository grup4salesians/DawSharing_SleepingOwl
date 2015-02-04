<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Default Content')</title>
		@include('includes.head')
	</head>
	<body>
		<!--header starts-->
		<div class="header">
			@include('includes.header')
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
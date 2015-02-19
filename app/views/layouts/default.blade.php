<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Default Content')</title>
		@include('includes.head')
                @include ('includes\headapigoogle')
	</head>
	<body>
		<!--header starts-->
		<div class="header">
			@include('includes.header')
		</div>

		@yield('content')
		
		<!---->
		<div class="fotter" style="display:none;">
			@include('includes.footer')
		</div>
		<!---->
		<div class="fotter-info">
			@include('includes.footer-info')
		</div>
		<!---->

	</body>
</html>
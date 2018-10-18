<!DOCTYPE html>
<html lang="fa" dir="rtl">
	<head>
		@include('common.header')
	</head>
	<body>
		<div class="double-seperate"></div>
		<div class="big-container">
			@yield('big-container')
		</div>
		<div class="container-fluid">
			@yield('fluid-container')
		</div>
		<div class="container">
			@yield('container')
		</div>
		@yield('footer')
		@stack('script')
	</body>
</html>


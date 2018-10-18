<!DOCTYPE html>
<html lang="{{ Lang::locale() }}" dir="{{ Lang::locale() == 'fa' ? 'rtl' : 'ltr' }}">
	<head>
		@include('common.header')
	</head>
	<body>
		@include('common.navbar')
		<div class="container-fluid">
			@yield('fluid-container')
		</div>
		<div class="container">
			<div class="background-container">
				@yield('container')
			</div>
		</div>
		@stack('script')
	</body>
</html>


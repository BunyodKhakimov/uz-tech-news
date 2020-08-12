<!DOCTYPE HTML>
<html>
	<head>
		<title>Future Imperfect</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{asset('css/app.css')}}" />
		<link rel="stylesheet" href="{{asset('css/main.css')}}" />
		@yield('stylesheets')
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!-- Wrapper -->
		<div id="wrapper">
			@include('partials._header')
			@include('partials._menu')
			<!-- Main -->
			<div id="main">
				@include('partials._message')
				@yield('content')
			</div>
			@include('partials._sidebar')
		</div>
		<!-- Scripts -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/skel.min.js') }}"></script>
		<script src="{{ asset('js/util.js') }}"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="{{ asset('js/main.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('scripts')

	</body>
</html>
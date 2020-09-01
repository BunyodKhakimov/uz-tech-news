<!DOCTYPE HTML>
<html>
	<head>
		<title>UzTech | @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ asset('images/profile.png') }}" type="image/png">
		@yield('stylesheets')
		{{-- <script src="{{ asset('js/ie/html5shiv.js') }}"></script> --}}
		{{-- <link rel="stylesheet" href="{{asset('css/app.css')}}" /> --}}
		{{-- <link rel="stylesheet" href="{{ asset('css/css/ie9.css') }}" /> --}}
		{{-- <link rel="stylesheet" href="{{ asset('css/ie8.css') }}" /> --}}
		<link rel="stylesheet" href="{{asset('css/main.css')}}" />
		
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
			@include('partials._sidebar_demo')
		</div>
		<!-- Scripts -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/skel.min.js') }}"></script>
		<script src="{{ asset('js/util.js') }}"></script>
		<script src="{{ asset('js/ie/respond.min.js')}}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('scripts')

	</body>
</html>
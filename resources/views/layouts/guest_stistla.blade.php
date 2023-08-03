<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{asset('stisla/assets/modules/bootstrap/css/bootstrap.css')}}">
	<!-- font-awesome-n -->
	<link rel="stylesheet" type="text/css" href="{{ asset('stisla/assets/modules/fontawesome/css/all.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<!-- CSS Libraries -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{asset('stisla/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('stisla/assets/css/components.css')}}">
	<!-- Start GA -->

</head>

<body>
<div id="app">
	{{$slot}}
</div>

<!-- General JS Scripts -->
<script src="{{asset('stisla/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('stisla/assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/modules/tooltip.js')}}"></script>
<script src="{{asset('stisla/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('stisla/assets/modules/nicescroll/dist/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/modules/moment.min.js')}}"></script>
<script src="{{asset('stisla/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('stisla/assets/js/scripts.js')}}"></script>
<script src="{{asset('stisla/assets/js/custom.js')}}"></script>
</body>
</html>

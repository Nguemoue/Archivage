<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
	<!--  Title -->
	<title>{{config('app.name')}}</title>
	<!--  Required Meta Tag -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="handheldfriendly" content="true"/>
	<meta name="MobileOptimized" content="width"/>
	<meta name="description" content="Mordenize"/>
	<meta name="author" content=""/>
	<meta name="keywords" content="Mordenize"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<!--  Favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('favicon.ico')}}"/>
	<!-- Core Css -->
	<link rel="stylesheet" href="{{asset('_materialize_v2/fonts/tabler-icons/tabler-icons.css')}}">
	<link rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
			integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
			crossorigin="anonymous" referrerpolicy="no-referrer"/>
	{{--datatables styles--}}
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
	<link id="themeColors" rel="stylesheet" href="{{asset('_materialize_v2/dist/css/style.min.css')}}"/>

	@stack("styles")
</head>
<body>
<!-- Preloader -->
@include("layouts._materializev2.partials.preloader")
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
	  data-sidebar-position="fixed" data-header-position="fixed">
	<!-- Header Start -->
	@yield('header')
	{{--	@include("layouts._materializev2.partials.header")--}}
	<!-- Header End -->
	<!-- Sidebar Start -->
	@yield('sidebar')
	{{--	@include("layouts._materializev2.partials.sidebar")--}}
	<!--  Sidebar End -->
	<!--  Main wrapper -->
	<div class="body-wrapper">
		<div class="container-fluid">
			@yield("content")
		</div>
		@stack("body-end")

	</div>
	<div class="dark-transparent sidebartoggler"></div>
</div>
<!--  Shopping Cart -->

<!--  Mobilenavbar -->
{{--@include("layouts._materializev2.partials.navbarmobile")--}}

<!--  Search Bar -->
<x-ui.blade-search/>
<!--  Customizer -->

<!--  Customizer -->
<!--  Import Js Files -->
@include("layouts._materializev2.import_script")
<!--  core files -->
@include("layouts._materializev2.script_core")
{{--datatable scripts--}}

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<!--  current page js files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
		  integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('templates.partials.izitoast')
<script >
	$(document).ready(function () {
		var table = $(".table").DataTable()
	})
</script>
@stack("scripts")

</body>
</html>

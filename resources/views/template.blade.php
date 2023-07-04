<!DOCTYPE html>
<html lang="fr">

<head>
	<title>@yield('title', env('APP_NAME'))</title>
	<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 10]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Meta -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<meta name="keywords" content="archivage"/>
	<meta name="author" content="developper"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{asset('assets/css/file-input-preview.css')}}">
	@livewireStyles

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<!-- waves.css -->
	<link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
	<!-- waves.css -->
	<link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
	<!-- themify icon -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
	<!-- font-awesome-n -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome-n.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<!-- scrollbar.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--	sumernote--}}
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

	{{-- link for datatables	--}}
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
	@stack("styles")

</head>

<body>
@routes
<!-- Pre-loader start -->
<x-preloader-component/>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
	<div class="pcoded-overlay-box"></div>
	<div class="pcoded-container navbar-wrapper">
		@includeIf('_partials.nav')
		<div class="pcoded-main-container">
			<div class="pcoded-wrapper">
				@includeIf('_partials.sidebar')
				<div class="pcoded-content">
					<!-- Page-header start -->
				@yield('header')
				<!-- Page-header end -->
					<div class="pcoded-inner-content">
						<!-- Main-body start -->
						<div class="main-body">
							<div class="page-wrapper">
								<!-- Page-body start -->
								<div class="page-body">
									@yield('content')
								</div>
								<!-- Page-body end -->
							</div>
							{{-- <div id="styleSelector"> </div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
	<h1>Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
		to access this website.</p>
	<div class="iew-container">
		<ul class="iew-download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="assets/images/browser/chrome.png" alt="Chrome">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="assets/images/browser/firefox.png" alt="Firefox">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="assets/images/browser/opera.png" alt="Opera">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="assets/images/browser/safari.png" alt="Safari">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="assets/images/browser/ie.png" alt="">
					<div>IE (9 & above)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->

<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }} "></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{asset("assets/js/bootstrap/js/bootstrap.min.js")}}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
<!-- waves js -->
<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- slimscroll js -->
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@livewireScripts

<!-- menu js -->
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/vertical/vertical-layout.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- SUMERNOTE --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

{{-- end of sumernote--}}
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/file-input-preview.js')}}"></script>
@stack("scripts")
<script defer>
	$(document).ready(function(){
		var table = $(".table").DataTable()
		$(".sumernote").summernote({
			placeholder:"content"
		})
		$(".select2").select2();
		$(".input-file-preview").fileInputPreview()
		@includeIf("_partials.swal")
	})

</script>
</body>
</html>

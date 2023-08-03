<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{asset('stisla/assets/modules/bootstrap/css/bootstrap.css')}}">
	<!-- font-awesome-n -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome-n.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<!-- CSS Libraries -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{asset('stisla/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('stisla/assets/css/components.css')}}">
	<!-- Start GA -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}

		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA --></head>
{{--remove class layout-3--}}
<body class="layout-3">
<div id="app">
	<div class="main-wrapper container">
		<div class="navbar-bg"></div>
		<nav class="navbar navbar-expand-lg main-navbar">
			<a href="/" class="navbar-brand sidebar-gone-hide">{{config("app.name")}}</a>
			@if(!View::hasSection("top_navigation"))
				<a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
			@endif
			@if(!View::hasSection("navbar.nav"))
				<div class="nav-collapse">
					<a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
						<i class="fas fa-ellipsis-v"></i>
					</a>
					<ul class="navbar-nav">
						<li class="nav-item active"><a href="#" class="nav-link">Acceuil</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Notifications</a></li>
					</ul>
				</div>
			@endif
			{{--for form seach--}}
			@if(!View::hasSection("navbar.account"))
				<ul class="navbar-nav bg-danger">

					<li class="dropdown"><a href="#" data-toggle="dropdown"
													class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<i class="fa fa-user"></i>
							<div class="d-sm-none d-lg-inline-block">{{auth()->user()->name}}</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged
								in {{auth()->user()->connections->last()->updated_at->diffForHumans()}}</div>
							<a href="#" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<a href="#" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a href="#" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<form onclick="this.submit()" action="{{url('/logout')}}" method="post">
								@csrf
								<a href="#" class="dropdown-item has-icon text-danger">
									<i class="fas fa-sign-out-alt"></i> Logout
								</a>
							</form>
						</div>
					</li>
				</ul>
			@endif
		</nav>

		@if(!View::hasSection("top_navigation"))
			<nav class="navbar navbar-secondary navbar-expand-lg">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Page</span></a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a href="#" class="nav-link">Accueuil</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
							</ul>
						</li>
						<li class="nav-item active">
							<a href="#" class="nav-link"><i class="far fa-heart"></i><span>Home</span></a>
						</li>
						<li class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Espaces</span></a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a href="#" class="nav-link">Utilisateur</a></li>
								<li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Administrateurs</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a href="#" class="nav-link">Simple Administrateur</a></li>
										<li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Super Administrateur</a>
											<ul class="dropdown-menu">
												<li class="nav-item"><a href="#" class="nav-link">Link</a></li>
												<li class="nav-item"><a href="#" class="nav-link">Link</a></li>
												<li class="nav-item"><a href="#" class="nav-link">Link</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		@endif

	<!-- Main Content -->
		<div class="main-content">
			@yield("main-content")
		</div>

		@if(!View::hasSection("footer"))
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; {{today()->isoFormat('ll')}}
					<div class="bullet"></div>
					Design By <a href="https://github.com/Nguemoue">@LucDev</a>
				</div>
				<div class="footer-right">

				</div>
			</footer>
		@endif
	</div>
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

<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">
		<div class="navbar-logo">
			<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
				<i class="ti-menu"></i>
			</a>
			<div class="mobile-search waves-effect waves-light">
				<div class="header-search">
					<div class="main-search morphsearch-search">
						<div class="input-group">
                            <span class="input-group-prepend search-close"><i
											 class="ti-close input-group-text"></i></span>
							<input type="text" class="form-control" placeholder="Enter Keyword">
							<span class="input-group-append search-btn"><i
									class="ti-search input-group-text"></i></span>
						</div>
					</div>
				</div>
			</div>
			<a href="{{route('superAdmin.home')}}">
				<em>Administration</em>
				{{-- <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" /> --}}
			</a>
			<a class="mobile-options waves-effect waves-light">
				<i class="ti-more"></i>
			</a>
		</div>
		<div class="navbar-container container-fluid">
			<ul class="nav-left">
				<li>
					<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
				</li>
				<li>
					<a href="#" onclick="toggleFullScreen()" class="waves-effect waves-light">
						<i class="ti-fullscreen"></i>
					</a>
				</li>
			</ul>
			<ul class="nav-right">
				<li class="">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<x-dynamic-component :component="'flag-language-'.\LaravelLocalization::getCurrentLocale()"/>
						{{LaravelLocalization::getCurrentLocaleName()}}
					</a>
					<ul class="dropdown-menu">
						@foreach($supportedlocales as $key=>$locale)
							<li @class(["dropdown-item nav-link","active"=>LaravelLocalization::getCurrentLocale() == $key])>
								<a href="{{\LaravelLocalization::getLocalizedURL($key)}}" class="text-dark text-capitalize"> <x-dynamic-component :component="'flag-language-'.$key"/> {{$locale['native']}}</a>
							</li>
						@endforeach

					</ul>
				</li>
				<li class="header-notification">
					<a href="#!" class="waves-effect waves-light">
						<i class="ti-bell"></i>
						<span class="badge bg-c-red"></span>
					</a>
					<x-notification-component :user="auth(superAdminGuard())->user()"/>
				</li>
				<li class="user-profile header-notification">
					<a href="#!" class="waves-effect waves-light">
						<img src="{{ asset('logo-admin.jpg') }}" class="img-radius" alt="User-Profile-Image">
						<span>{{auth(superAdminGuard())->user()->name}}</span>
						<i class="ti-angle-down"></i>
					</a>
					<ul class="show-notification profile-notification">
						<li class="waves-effect waves-light">
							<a href="#!">
								<i class="ti-settings"></i> Settings
							</a>
						</li>
						<li class="waves-effect waves-light">
							<a href="#">
								<i class="ti-user"></i> Profile
							</a>
						</li>
						<li class="waves-effect waves-light">
							<a href="#">
								<i class="ti-email"></i> My Messages
							</a>
						</li>
						<li class="waves-effect waves-light">
							<a href="#">
								<i class="ti-lock"></i> Lock Screen
							</a>
						</li>
						<form action="{{route('superAdmin.logout')}}" id="logoutForm" method="post">@csrf</form>
						<li class="waves-effect waves-light">
							<a href="#!" onclick="document.forms.logoutForm.submit()">
								<i class="ti-layout-sidebar-left"></i> Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

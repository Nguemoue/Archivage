<header class="app-header">
	<nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
		<ul class="navbar-nav">
			<li class="nav-item d-block d-xl-none">
				<a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
					<i class="ti ti-menu-2"></i>
				</a>
			</li>
			<li class="nav-item d-none d-xl-block">
				<a href="{{route('superAdmin.home')}}" class="text-nowrap nav-link">
					<img src="{{asset('logo.jpg')}}" class="dark-logo" width="60" alt="" />
					<img src="{{asset('logo.jpg')}}" class="light-logo"  width="60" alt="" />
				</a>
			</li>
			<li class="nav-item d-none d-xl-block">
				<a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
					<i class="ti ti-search"></i>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav quick-links d-none d-xl-flex">
			<li class="nav-item dropdown-hover d-none d-xl-block">
				<a class="nav-link" href="javascript:void(0)">{{config('app.name')}}</a>
			</li>
			<li class="nav-item dropdown-hover d-none d-xl-block">
				<a class="nav-link" href="javascript:void(0)">Teledeclaration</a>
			</li>
		</ul>

		<button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
              <i class="ti ti-dots fs-7"></i>
            </span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
				<a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
					<i class="ti ti-align-justified fs-7"></i>
				</a>
				<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
					<li class="nav-item dropdown">
						<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
							<img src='{{asset("_materialize_v2/dist/images/svgs/icon-flag-".app()->getLocale().".svg")}}' alt="" class="rounded-circle object-fit-cover round-20">
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
							<div class="message-body" data-simplebar>
								@foreach($supportedlocales as $key=>$locale)
								<a href="{{\LaravelLocalization::getLocalizedURL($key)}}" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
									<div class="position-relative">
										<img src="{{asset(sprintf('_materialize_v2/dist/images/svgs/icon-flag-%s.svg',$key))}}" alt="" class="rounded-circle object-fit-cover round-20">
									</div>
									<p class="mb-0 fs-3">{{$locale['native']}} ({{$key}})</p>
								</a>
								@endforeach

							</div>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="ti ti-bell-ringing"></i>
							<div class="notification bg-primary rounded-circle"></div>
						</a>
						<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
							<x-notification-component :user="auth(superAdminGuard())->user()"/>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
							<div class="d-flex align-items-center">
								<div class="user-profile-img">
									<img src="{{asset('_materialize_v2/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="35" height="35" alt="" />
								</div>
							</div>
						</a>
						<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
							<div class="profile-dropdown position-relative" data-simplebar>
								<div class="py-3 px-7 pb-0">
									<h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
								</div>
								<div class="d-flex align-items-center py-9 mx-7 border-bottom">
									<img src="{{asset('_materialize_v2/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="80" height="80" alt="" />
									<div class="ms-3">
										<h5 class="mb-1 fs-3">Mathew Anderson</h5>
										<span class="mb-1 d-block text-dark">Designer</span>
										<p class="mb-0 d-flex text-dark align-items-center gap-2">
											<i class="ti ti-mail fs-4"></i> info@modernize.com
										</p>
									</div>
								</div>
								<div class="message-body">
									<a href="./page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                              <img src="{{asset('_materialize_v2/dist/images/svgs/icon-account.svg')}}" alt="" width="24" height="24">
                            </span>
										<div class="w-75 d-inline-block v-middle ps-3">
											<h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
											<span class="d-block text-dark">Account Settings</span>
										</div>
									</a>
								</div>
								<div class="d-grid py-4 px-7 pt-8">
									<a href="#" class="btn btn-outline-primary">Log Out</a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

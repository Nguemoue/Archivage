<nav class="pcoded-navbar">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">

		<div class="pcoded-navigation-label">Navigation</div>
		<ul class="pcoded-item pcoded-left-item">
			<li @class(["active"=>Route::is('home')])>
				<a href="{{ route('home') }}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>


		{{-- box pour les fichiers --}}
		{{-- <div class="pcoded-navigation-label">Fichier</div>

		<ul class="pcoded-item pcoded-left-item">
			 <li  @class(["pcoded-hasmenu","active"=>Route::is('fichiers.*')])>
				  <a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>add</b></span>
						<span class="pcoded-mtext">Gestion de fichier</span>
						<span class="pcoded-mcaret"></span>
				  </a>
				  <ul class="pcoded-submenu">
						<li class=" ">
							 <a href="{{ route('fichiers.create') }}" class="waves-effect waves-dark">
								  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								  <span class="pcoded-mtext">Lister les Fichier</span>
								  <span class="pcoded-mcaret"></span>
							 </a>
						</li>
						<li class=" ">
							 <a href="{{ route('scan.index') }}" class="waves-effect waves-dark">
								  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								  <span class="pcoded-mtext">Scanner</span>
								  <span class="pcoded-mcaret"></span>
							 </a>
						</li>

						<li @class(["active"=>Route::is('fichiers.create')])>
							 <a href="{{ route('fichiers.create') }}" class="waves-effect waves-dark">
								  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								  <span class="pcoded-mtext">Ajouter un fichier</span>
								  <span class="pcoded-mcaret"></span>
							 </a>
						</li>

				  </ul>
			 </li>
		</ul> --}}
		<div class="pcoded-navigation-label">Page de Gestion</div>
		<ul class="pcoded-item pcoded-left-item">
			<li @class(["pcoded-hasmenu","active"=>Route::is('type.*') || Route::is("soustype.*")])>
				<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>add</b></span>
					<span class="pcoded-mtext">Gestion </span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					@can(config('perm_names.MAN_TYPE'))
						<li @class(["active"=>Route::is('type.*')])>
							<a href="{{ route('type.index') }}" class="waves-effect waves-dark">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext"> types</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					@endcan
					@can(config('perm_names.MAN_SOUSTYPE'))
						<li @class(["active"=>Route::is('soustype.*')])>
							<a href="{{ route('soustype.index') }}" class="waves-effect waves-dark">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext"> sous types</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					@endcan
					@can(config('perm_names.MAN_CLASS'))

						<li @class(["active"=>Route::is('classsement.*')])>
							<a href="{{ route('classement.index') }}" class="waves-effect waves-dark">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext"> Classement</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					@endcan
					@can(config('perm_names.MAN_SOUSCLASS'))

						<li @class(["active"=>Route::is('sousclasssement.*')])>
							<a href="{{ route('sousClassement.all') }}" class="waves-effect waves-dark">
								<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
								<span class="pcoded-mtext"> SousClassement</span>
								<span class="pcoded-mcaret"></span>
							</a>
						</li>
					@endcan

				</ul>
			</li>
		</ul>

		<div class="pcoded-navigation-label">Autres espaces</div>
		<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu ">
				<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
					<span class="pcoded-mtext">Espace</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li class="">
						<a href="{{route('admin.home')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="fa fa-print"></i></span>
							<span class="pcoded-mtext"> Administrateur</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li class="">
						<a href="{{route('superAdmin.home')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext"> Super Administrateur</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
		</ul>


		{{-- <ul class="pcoded-item pcoded-left-item">
			 <form action="{{route('logout')}}" method="post">
				  @csrf
				  <button class="mx-auto  btn btn-danger"><i class="ti-logout"></i> Se deconnecter</button>
			 </form>
		</ul> --}}
	</div>
</nav>

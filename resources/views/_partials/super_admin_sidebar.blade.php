<nav class="pcoded-navbar">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigation-label">Panel</div>
		<ul class="pcoded-item pcoded-left-item">
			<li @class(["active"=>Route::is("superAdmin.home")])>
				<a href="{{route('superAdmin.home')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<li @class(["active"=>Route::is("superAdmin.permission.*")])>
				<a href="{{route('superAdmin.permission.home')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-user"></i></span>
					<span class="pcoded-mtext">Permissions</span>
				</a>
			</li>

		</ul>

		<div class="pcoded-navigation-label">Gestions</div>
		<ul class="pcoded-item pcoded-left-item">
			<li  @class(["pcoded-hasmenu",
								"active pcoded-trigger"=>
								\Route::is(["superAdmin.connection.index",
								"superAdmin.admin.account.list","superAdmin.user.account.list",
								"superAdmin.structure.list","superAdmin.log.*"
								]
								)])>
				<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
					<span class="pcoded-mtext">Resources</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<li @class(["active"=>\Route::is("superAdmin.connection.index")])>
						<a href="{{route('superAdmin.connection.index')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="fa fa-print"></i></span>
							<span class="pcoded-mtext"> Connections</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li @class(["active"=>\Route::is("superAdmin.user.account.list")])>
						<a href="{{route('superAdmin.user.account.list')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="ti-angle-right"></i></span>
							<span class="pcoded-mtext"> Utilisateur</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li @class(["active"=>\Route::is("superAdmin.admin.account.list")])>
						<a href="{{route('superAdmin.admin.account.list')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="fa fa-print"></i></span>
							<span class="pcoded-mtext"> Comptes Administrateur</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li @class(["active"=>\Route::is("superAdmin.structure.list")])>
						<a href="{{route('superAdmin.structure.list')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="fa fa-print"></i></span>
							<span class="pcoded-mtext"> Structures</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<li @class(["active"=>\Route::is("superAdmin.log.list")])>
						<a href="{{route('superAdmin.log.list')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="fa fa-paperclip"></i></span>
							<span class="pcoded-mtext"> Log | Audit</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>

				</ul>
			</li>
		</ul>
	</div>


</nav>

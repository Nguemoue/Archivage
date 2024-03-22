<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div>
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav scroll-sidebar container-fluid">
			<ul id="sidebarnav">
				<!-- ============================= -->
				<!-- Home -->
				<!-- ============================= -->
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Home</span>
				</li>
				<!-- =================== -->
				<!-- Dashboard -->
				<!-- =================== -->
				<x-ui.sidebar.sidebar-item icon="ti ti-dashboard" text="Dashboard" :url="route('superAdmin.home')"/>


				<!-- ============================= -->
				<!-- Permissions -->
				<!-- ============================= -->
				<x-ui.sidebar.sidebar-item text="Permissions"  is-group>
					<x-slot name="groupItem">
						<x-ui.sidebar.sidebar-item :url="route('superAdmin.permission.web.index')" text=" Utilisateur"/>
						<x-ui.sidebar.sidebar-item :url="route('superAdmin.permission.admin.index')" text="Administrateurs"/>
					</x-slot>
				</x-ui.sidebar.sidebar-item>
				<!-- ============================= -->
				<!-- Connections -->
				<!-- ============================= -->
				<x-ui.sidebar.sidebar-item text="Connections" :url="route('superAdmin.connection.index')" />
				<!-- ============================= -->
				<!-- Accounts -->
				<!-- ============================= -->
				<x-ui.sidebar.sidebar-item text="Gestion Comptes"  is-group>
					<x-slot name="groupItem">
						<x-ui.sidebar.sidebar-item :url="route('superAdmin.user.account.list')" text="Utilisateurs"/>
						<x-ui.sidebar.sidebar-item :url="route('superAdmin.admin.account.list')" text="Administrateurs"/>
					</x-slot>
				</x-ui.sidebar.sidebar-item>
				<!-- ============================= -->
				<!-- Structures -->
				<!-- ============================= -->
				<x-ui.sidebar.sidebar-item text="Structures" :url="route('superAdmin.structure.list')"/>
				<!-- ============================= -->
				<!-- Log  / Audit -->
				<!-- ============================= -->
				<x-ui.sidebar.sidebar-item text="Logs & Autdit" :url="route('superAdmin.log.list')"/>

			</ul>

		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
	<div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3 mx-9 d-block d-lg-none">
		<div class="hstack gap-3 justify-content-between">
			<div class="john-img">
				<img src="{{asset('_materialize_v2/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
			</div>
			<div class="john-title">
				<h6 class="mb-0 fs-4">John Doe</h6>
				<span class="fs-2">Designer</span>
			</div>
			<button class="border-0 bg-transparent text-primary ms-2" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
				<i class="ti ti-power fs-6"></i>
			</button>
		</div>
	</div>
</aside>

<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div>
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav scroll-sidebar container-fluid">
			<ul id="sidebarnav">

				<x-ui.sidebar.sidebar-item icon="ti ti-home-2" :url=" route('home')" text="Dashboard"/>


				{{-- resource documents --}}
				<x-ui.sidebar.sidebar-item icon="ti ti-file-analytics" text="Ressources de documents" is-group>
					<x-slot name="groupItem">
						<x-ui.sidebar.sidebar-item :url=" route('soustype.index')" text="Sous types document"/>
						<x-ui.sidebar.sidebar-item :url="route('type.index')" text="Type document"/>
					</x-slot>
				</x-ui.sidebar.sidebar-item>


				{{-- classements --}}
				<x-ui.sidebar.sidebar-item icon="ti ti-filter" :url="route('classement.index')" text="Classement"/>

				{{-- Operations --}}
				<x-ui.sidebar.sidebar-item icon="ti ti-folder" text="Operations" is-group>
					<x-slot name="groupItem">
						<x-ui.sidebar.sidebar-item text="Scan"/>
						<x-ui.sidebar.sidebar-item text="Traitement"/>
						<x-ui.sidebar.sidebar-item  text="Analyse"/>
					</x-slot>
				</x-ui.sidebar.sidebar-item>

				{{-- domaines --}}
				<x-ui.sidebar.sidebar-item icon="ti ti-world" text="Espaces" is-group>
					<x-slot name="groupItem">
						<x-ui.sidebar.sidebar-item text="Administrateur"/>
						<x-ui.sidebar.sidebar-item text="Super Administrateur"/>
					</x-slot>
				</x-ui.sidebar.sidebar-item>

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

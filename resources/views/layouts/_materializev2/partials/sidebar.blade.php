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
				<li class="sidebar-item">
					<a class="sidebar-link" href="{{route('home')}}" aria-expanded="false">
                  <span>
                    <i class="ti ti-home-2"></i>
                  </span>
						<span class="hide-menu">Dashboard</span>
					</a>
				</li>
				<!-- ============================= -->
				<!-- Apps -->
				<!-- ============================= -->
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Apps</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                  <span>
                    <i class="ti ti-archive"></i>
                  </span>
						<span class="hide-menu">Apps</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<li class="sidebar-item">
							<a href="app-calendar.html" class="sidebar-link">
								<i class="ti ti-calendar"></i>
								<span class="hide-menu">Calendar</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="apps-kanban.html" class="sidebar-link">
								<i class="ti ti-layout-kanban"></i>
								<span class="hide-menu">Kanban</span>
							</a>
						</li>
					</ul>
				</li>
				<!-- ============================= -->
				<!-- PAGES -->
				<!-- ============================= -->
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">PAGES</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                  <span>
                    <i class="ti ti-notebook"></i>
                  </span>
						<span class="hide-menu">Pages</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<li class="sidebar-item">
							<a href="{{ route('type.index') }}" class="sidebar-link">
								<i class="ti ti-help"></i>
								<span class="hide-menu">Gestion Type</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="{{ route('soustype.index') }}" class="sidebar-link">
								<i class="ti ti-user-circle"></i>
								<span class="hide-menu">Sous type</span>
							</a>
						</li>

					</ul>
				</li>
				<!-- ============================= -->
				<!-- UI -->
				<!-- ============================= -->
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">UI</span>
				</li>
				<!-- =================== -->
				<!-- UI Elements -->
				<!-- =================== -->
				<li class="sidebar-item mega-dropdown">
					<a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                  <span class="rounded-3">
                    <i class="ti ti-layout-grid"></i>
                  </span>
						<span class="hide-menu">Classement</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<li class="sidebar-item">
							<a href="{{route('classement.index')}}" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Index</span>
							</a>
						</li>

					</ul>
				</li>
				<!-- ============================= -->
				<!-- Forms -->
				<!-- ============================= -->
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Domaines</span>
				</li>
				<!-- =================== -->
				<!-- Forms -->
				<!-- =================== -->
				<li class="sidebar-item">
					<a class="sidebar-link two-column has-arrow" href="#" aria-expanded="false">
                  <span class="rounded-3">
                    <i class="ti ti-file-text"></i>
                  </span>
						<span class="hide-menu">Domaine</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<!-- form elements -->
						<li class="sidebar-item">
							<a href="./form-inputs.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Forms Input</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-input-groups.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Input Groups</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-input-grid.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Input Grid</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-checkbox-radio.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Checkbox & Radios</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-bootstrap-touchspin.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Bootstrap Touchspin</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-bootstrap-switch.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Bootstrap Switch</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-select2.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Select2</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-dual-listbox.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Dual Listbox</span>
							</a>
						</li>
						<!-- form inputs -->
						<li class="sidebar-item">
							<a href="./form-basic.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Basic Form</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-vertical.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Form Vertical</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-horizontal.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Form Horizontal</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-actions.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Form Actions</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-row-separator.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Row Separator</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-bordered.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Form Bordered</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./form-detail.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Form Detail</span>
							</a>
						</li>
						<!-- form wizard -->
						<li class="sidebar-item">
							<a href="./form-wizard.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Form Wizard</span>
							</a>
						</li>
						<!-- Quill Editor -->
						<li class="sidebar-item">
							<a href="./form-editor-quill.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Quill Editor</span>
							</a>
						</li>
					</ul>
				</li>
				<!-- ============================= -->
				<!-- Tables -->
				<!-- ============================= -->
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Tables</span>
				</li>
				<!-- =================== -->
				<!-- Bootstrap Table -->
				<!-- =================== -->
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                  <span class="rounded-3">
                    <i class="ti ti-layout-sidebar"></i>
                  </span>
						<span class="hide-menu">Tables</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level">
						<li class="sidebar-item">
							<a href="./table-basic.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Basic Table</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./table-dark-basic.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Dark Basic Table</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./table-sizing.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Sizing Table</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./table-layout-coloured.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Coloured Table</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./table-datatable-basic.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Basic Initialisation</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./table-datatable-api.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">API</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="./table-datatable-advanced.html" class="sidebar-link">
								<i class="ti ti-circle"></i>
								<span class="hide-menu">Advanced Initialisation</span>
							</a>
						</li>
					</ul>
				</li>
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

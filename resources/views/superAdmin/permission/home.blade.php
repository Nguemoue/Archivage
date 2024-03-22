@extends("templates.templateSuperAdmin.templateSuperAdmin")

@section("content")
	<h5 class="text-center my-3">
		<p>
			<h3>Gestion des Permissions</h3>
		</p>
	</h5>
	<hr>
	<div class="row" >
		<div class="col-6">
			<a href="{{route('superAdmin.permission.admin.index')}}" style="line-height: 100px;" class="w-100 btn btn-outline-warning">
				<span class="fa fa-user-secret fa-2x"></span>
				Pour les Administrateurs
			</a>
		</div>
		<div class="col-6">
			<a href="{{route('superAdmin.permission.web.index')}}" style="line-height: 100px;" class="w-100 btn btn-outline-success">
				<span class="fa fa-user-secret fa-2x"></span>
				Pour les Utilisateurs
			</a>
		</div>
	</div>
@endsection


@extends('templates.templateSuperAdmin.templateSuperAdmin')

@section("content")
	<h5 class="text-center my-3">
		Permissions pour les Utilisateurs
	</h5>
	<div class="row gap-1 ">
		@foreach($permissions as $permission)
			<div class="col-3">
				<div class="card">
					<div class="card-body">
						<div class="card-text h6">
							{{$permission->name}}
						</div>
					</div>
					<hr>
					<div class="card-footer">
						<button class="btn btn-sm btn-secondary rounded">Manage</button>
						<button class="btn btn-outline-dark btn-sm">{{$permission->users_count}} Affecté(s)</button>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection


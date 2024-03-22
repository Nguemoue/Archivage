@extends("templates.templateSuperAdmin.templateSuperAdmin")

@section("content")
	<h5 class="text-center my-3">
		<p>
			{{auth(superAdminGuard())->user()->name}}
		</p>
	</h5>
	<hr>
	<div class="row border">
		<div class="col-sm-6 my-2">
			<a href="{{route('superAdmin.permission.home')}}" style="line-height: 100px;"
				class="w-100 btn btn-outline-primary">
				<span class="fa fa-user-secret fa-2x"></span>
				Gerer les Permissions
			</a>
		</div>
		<div class="col-sm-6 my-2">
			<a href="{{route('superAdmin.user.account.list')}}" style="line-height: 100px;"
				class="w-100 btn btn-outline-info">
				<span class="fa fa-user fa-2x"></span>
				Gerer les utilisateurs
			</a>
		</div>

		<div class="col-sm-6 my-2">
			<a href="{{route('superAdmin.log.list')}}" style="line-height: 100px;" class="w-100 btn btn-outline-warning">
				<span class="fa fa-paperclip fa-2x"></span>
				Gerer les Adminsitrateurs
			</a>
		</div>


		<div class="col-sm-6 my-2">
			<a href="{{route('superAdmin.log.list')}}" style="line-height: 100px;" class="w-100 btn btn-outline-success">
				<span class="fa fa-user-secret fa-2x"></span>
				Gerer l'audit
			</a>
		</div>
	</div>
@endsection


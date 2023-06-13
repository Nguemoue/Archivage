@extends("template_super_admin")

@section("content")
	<h5 class="text-center my-3">
		<p>
			{{auth(superAdminGuard())->user()->name}}
		</p>
	</h5>
	<hr>
	<div class="row gap-1  border" style="gap:4px 0px;font-family: 'Algerian',serif;letter-spacing: 2px;font-size: 5em;font-weight: bolder">
		<div class="col-6">
			<a href="{{route('superAdmin.permission.home')}}" style="line-height: 100px;" class="w-100 btn btn-outline-success">
				<span class="fa fa-user-secret fa-2x"></span>
				Gerer les Permissions
			</a>
		</div>
	</div>
@endsection


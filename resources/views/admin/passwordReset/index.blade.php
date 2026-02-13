@extends("layouts.materialize_guest")

@section("content")
	<div class="card w-75 mx-auto">
		<div class="card-header">
			<h5>Reinitialisation du mot de passe [Admin]</h5>
		</div>
		<div class="card-body">
			<form action="{{route('admin.change-password.store')}}" method="post">
				@csrf
				<div class="form-group mb-3">
					<label class="form-label" for="old_password">Ancien mot de passe</label>
					<input type="text" id="old_password" class="form-control" value="password">
				</div>

				<div class="form-group mb-3">
					<label class="form-label" for="password">Nouveua mot de passe</label>
					<input type="password" id="old_password" name="password" required class="form-control" >
				</div>
				<div class="form-group mb-3">
					<label class="form-label" for="confirm_password">Confirmer le mot de passe</label>
					<input type="password" name="password_confirmation" id="confirm_password" required class="form-control" >
				</div>
				<div class="d-flex justify-content-end">
					<button class="btn btn-success">Réinitialiser</button>
				</div>
			</form>
		</div>
	</div>
@endsection

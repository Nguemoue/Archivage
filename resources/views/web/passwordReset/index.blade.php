<x-guest-stisla-layout>

<div class="card w-75 mx-auto">
	<div class="card-header">
		Reinitialisation du mot de passe
	</div>
	<div class="card-body">
		<form action="{{route('web.change-password.store')}}" method="post">
			@csrf
			<div class="form-group">
				<label for="old_password">Ancien mot de passe</label>
				<input type="text" id="old_password" class="form-control" value="password">
			</div>
			<hr>
			<div class="form-group">
				<label for="password">Nouveua mot de passe</label>
				<input type="password" id="old_password" name="password" required class="form-control" >
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirmer le mot de passe</label>
				<input type="password" name="password_confirmation" id="confirm_password" required class="form-control" >
			</div>
			<hr>
			<div class="d-flex justify-content-around">
				<button class="btn btn-danger btn-sm">reset</button>
				<button class="btn btn-success btn-sm">Réinitialiser</button>
			</div>
		</form>
	</div>
</div>


</x-guest-stisla-layout>

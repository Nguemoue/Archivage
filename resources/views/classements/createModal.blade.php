<fieldset x-data="{ open: false, mime: 'image/*' }">
	<form action="{{ route('classement.store') }}" enctype="multipart/form-data" method="POST">
		@csrf
		<div class="mb-3">
			<label for="nom" class="form-label">Nom du Dossier</label>
			<input type="text" name="nom" class="form-control"
					 placeholder="Entrez le nom du type" value="{{ old('nom') }}" />
		</div>

		<button type="submit" class="btn btn-success">
			<span class="fa fa-send"></span>
			Enregistrer
		</button>

	</form>
</fieldset>

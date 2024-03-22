<fieldset x-data="{ open: false, mime: 'image/*' }">
	<form action="{{ route('type.store') }}" enctype="multipart/form-data" method="POST">
		@csrf
		<div class="mb-3">
			<label for="nom" class="form-label">Nom du type</label>
			<input type="text" name="nom" id="nom" class="form-control"
					 placeholder="Entrez le nom du type" value="{{ old('nom') }}" />
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">
				Description
			</label>
			<textarea  name="description" class="summernote form-control" id="description" >{{ old('description') }}</textarea>
		</div>

		<button type="submit" class="btn btn-success">
			<span class="ti ti-send"></span>
			Enregistrer
		</button>

	</form>
</fieldset>

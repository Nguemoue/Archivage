@extends("templates.templateUser.templateUser")
@push("styles")
	<style>
		.selected-files{
			background: transparent;
			/*box-shadow: 0 0 4px #ccc, -1px -1px 4px #ccc;*/
		}
		.selected-files .file-item{
			font-weight: bold;
			font-family: "Open Sans", sans-serif;
			border: 1px solid rgba(0,0,0,.5);
			border-radius: 8px;
			text-align: center;
			padding: 8px;
			background-color: rgba(255,255,255,.5);
			position: relative;
		}
		.selected-files .file-item .remove-button{
			position: absolute;
			right: 10px;


		}

	</style>
@endpush
@section("content")
<a href="{{ route('scan.index') }}" class="btn btn-success"><i class="ti ti-arrow-left"></i> Retour</a>
    <h2 class="text-center my-4">Scann Des Dossiers</h2>
    <hr>
    <div class="card">
        <div class="card-header"><h4>Formulaire de scann</h4></div>
        <div class="card-body">
            @includeIf("_partials.errors")

            <form action="{{ route('scann.dossier.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="mb-4">
                    <label for="titre" class="form-label">Titre du dossier</label>
                    <input id="titre" type="text" class="form-control" placeholder="Titre du dossier" required name="titre">
                </div>
                <div class="mb-3">
						 <div class="selected-files-container">
							 <label for="url" class="btn btn-outline-secondary file-input-label">
								 <span class="button-label">Choisir les fichiers</span>
								 <i class="ti ti-hand-move"></i>
							 </label>
						 </div>
                    <input required type="file" class="d-none input-file-preview" id="url" name="files[]" multiple accept="application/pdf,image/*"/>

					 </div>
                <button type="submit" class="btn btn-primary btn-sm p-2"><i class="ti ti-send"></i> transferer</button>
            </form>
        </div>
    </div>
@endsection

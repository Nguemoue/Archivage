@extends("templates.templateUser.templateUser")
@push("styles")
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
	<link rel="stylesheet" href="{{asset('_materialize_v2/dist/libs/select2/dist/css/select2.min.css')}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
	<style>
		.dz-message {
			text-align: center;
			font-size: 28px;
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
    <h2 class="text-center my-4">Scan Des Dossiers</h2>
    <hr>
    <div class="card">
        <div class="card-header"><h4>Formulaire de scann</h4></div>
        <div class="card-body" x-data="{existing:1}">
            @includeIf("_partials.errors")
            <form id="uploadForm" class="dropzone" action="{{ route('scann.dossier.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf
					<div class="mb-4">
						<input x-model="existing" type="radio" value="0" class="btn-check" name="folder_existing" id="option1" autocomplete="off" checked>
						<label class="btn btn-outline-primary rounded-pill font-medium" for="option1">Nouveau dossier?</label>

						<input x-model="existing" type="radio" value="1" class="btn-check" name="folder_existing" id="option2" autocomplete="off">
						<label class="btn btn-outline-dark rounded-pill font-medium" for="option2">Dossier Existant?</label>
					</div>
					<div class="mb-4" x-show="existing=='0'">
						<label for="titre" class="form-label">Titre du dossier</label>
						<input id="titre" type="text" class="form-control" placeholder="Titre du dossier" :required="existing=='0'" name="titre">
					</div>
					<div x-show="existing=='1'">
						<label for="existing_name" class="form-label">Selection du Dossier Existant.</label>
						<select name="existing_name" id="existing_name" class="form-control select2" :required="existing=='1'">
							@foreach($dossiers as $dossier)
								<option value="{{$dossier->id}}">{{$dossier->nom}}</option>
							@endforeach
						</select>
					</div>
                <div class="mb-3">
						 <div class="dz-message border-danger" >
							 Drop files here or click to upload.
						 </div>
					 </div>
            </form>
			  <button type="button" onclick="submitForm()" class="mt-3 btn btn-dark btn-sm p-2"><i class="ti ti-send"></i> Transferer</button>
        </div>
    </div>
@endsection

@push('scripts')
	@vite(['resources/js/app.js'])
	<script src="{{asset('_materialize_v2/dist/libs/select2/dist/js/select2.min.js')}}"></script>
	<script src="{{asset('js/alpinejs.js')}}"></script>
	<script>
		$(function (){
			$('.select2').select2();
		})
	</script>
	<script>
		Dropzone.autoDiscover = false;

		var myDropzone = new Dropzone("#uploadForm", {
			autoProcessQueue: false,
			parallelUploads: 10,
			addRemoveLinks: true,
			acceptedFiles: 'image/*,application/pdf',
			url: '{{ route("scann.dossier.store") }}'
		});

		function submitForm() {
			let folderName = document.getElementById('titre').value;
			let message = 'Veuillez renseigner un nom de dossier valide.';
			let existingChecked = document.querySelector('[name="folder_existing"]:checked');
			if (existingChecked.value !== '0'){
				folderName = document.getElementById('existing_name').value
				message = 'Veuillez Selectionner un nom de dossier'
			}
			if (!folderName) {
				alert(message);
				return;
			}

			let formData = new FormData();
			formData.append('_token', '{{ csrf_token() }}');
			formData.append('title', folderName);
			formData.append('existing_folder',existingChecked.value)

			myDropzone.files.forEach(function(file) {
				formData.append('files[]', file);
			});

			if (myDropzone.files.length === 0){
				alert('select a file');
				return
			}

			axios.postForm('{{ route("scann.dossier.store") }}',formData).then((data)=>{
				myDropzone.removeAllFiles();
				iziToast.success({
					position:'topLeft',
					message:"Fichier mis a jour avec success"
				})
			},(error)=>{
				iziToast.error({
					position:'topLeft',
					message:error.response.data.message
				})
			})
			let xhr = new XMLHttpRequest();
			xhr.open('POST', '{{ route("scann.dossier.store") }}', true);
			xhr.onload = function() {
				if (xhr.status === 200) {
					alert('Mis a jour avec success');
					myDropzone.removeAllFiles();
				} else {
					alert('Erreur lors de l\'envoi des fichiers.');
				}
			};

			//xhr.send(formData);
		}

		myDropzone.on('queuecomplete', function() {
			// Handle the completion of all file uploads
		});
	</script>
@endpush

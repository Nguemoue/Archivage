@extends("templates.templateUser.templateUser")
@push("styles")
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
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
        <div class="card-body">
            @includeIf("_partials.errors")
            <form id="uploadForm" class="dropzone" action="{{ route('scann.dossier.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="mb-4">
                    <label for="titre" class="form-label">Titre du dossier</label>
                    <input id="titre" type="text" class="form-control" placeholder="Titre du dossier" required name="titre">
                </div>
                <div class="mb-3">
						 <div class="dz-message border-danger" >
							 Drop files here or click to upload.
						 </div>
					 </div>
            </form>
			  <button type="button" onclick="submitForm()" class="mt-3 btn btn-primary btn-sm p-2"><i class="ti ti-send"></i> Transferer</button>
        </div>
    </div>
@endsection

@push('scripts')
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
			var folderName = document.getElementById('titre').value;
			if (!folderName) {
				alert('Please enter a folder name.');
				return;
			}

			var formData = new FormData();
			formData.append('_token', '{{ csrf_token() }}');
			formData.append('title', folderName);

			myDropzone.files.forEach(function(file) {
				formData.append('files[]', file);
			});

			var xhr = new XMLHttpRequest();
			xhr.open('POST', '{{ route("scann.dossier.store") }}', true);
			xhr.onload = function() {
				if (xhr.status === 200) {
					alert('All files have been uploaded successfully.');
					myDropzone.removeAllFiles();
				} else {
					alert('An error occurred while uploading the files.');
				}
			};

			xhr.send(formData);
		}

		myDropzone.on('queuecomplete', function() {
			// Handle the completion of all file uploads
		});
	</script>
@endpush

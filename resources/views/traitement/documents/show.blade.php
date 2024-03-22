@extends("templates.templateUser.templateUser")

@section("title")
	Edition
@endsection

@section("content")
	@routes('traitement.document.*')
	<livewire:traitement.traitement-document :dossier-id="$dossierId" :document="$document"/>

@endsection


@push("scripts")
	@vite('resources/js/app.js')
	<script>
		function prepareValidation(form){
			let data = $(form).serializeArray();
			let result = [];
			for(let item of data){
				let objectName = item.name;
				if( objectName !=='_token' || objectName !== '' ){
					result.push(item)
				}
			}
			result = JSON.stringify(result);
			form.querySelector('#documentFieldData').value = result
		}
	</script>
@endpush

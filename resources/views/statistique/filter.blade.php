@extends('templates.templateUser.templateUser')
@push("styles")
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push("scripts")
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush
@section('content')
	<div class="container-fluid">
		<h2 class="text-center">Filtre pour Les Statistique</h2>
		<hr>
		<div class="card">
			<div class="card-footer">
				Formulaire de PreStatistique
			</div>
			<hr>

			<div class="card-body">
				<form action="{{route('statistique.home')}}" method="post">
					@csrf
					<div class="form-group mb-2">
						<label class="form-label" for="periode">Choisissez la periode</label>
						<input type="date" name="periode" id="periode" class="form-control flatpickr">
					</div>
					<div class="mb-2 form-group">
						<label class="form-label" for="sousType">Selectionner le Document Contextuele Rattacher</label>
						<select name="sousType" id="sousType" class="form-control border select2">
							<option value="-1" selected>-----------------------</option>
							@foreach($sousTypes as $sousType)
								<option value="{{$sousType->id}}">{{$sousType->nom}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group mb-2">
						<label class="form-label" for="champ">champ</label>
						<select name="champ" class="form-control form-select select2" id="champ">
							<option value="-1">-------------------------</option>
						</select>
					</div>
					<div class="mb-2 form-group" >
						<label class="form-label" for="type">Type de donnees du champ</label>
						<select name="type" class="form-control border" id="type">
							<option value="int">Nombre</option>
							<option value="string">texte</option>
						</select>
					</div>
					<hr class="my-4">
					<div class="mb-2 form-groip">
						<label class="form-label" for="champTab">champ pour le tableau de statistique</label>
						<div id="chamTab">

						</div>
					</div>
					<button class="btn btn-success">
						soumettre <i class="ti ti-send"></i>
					</button>
				</form>
			</div>
		</div>

	</div>
@endsection

@push('scripts')
	<script src="{{ mix('js/app.js') }}"></script>

    <script >
        console.log($)
        $("#sousType").on('change',function (event){
            $.get(`/api/sousType/${event.target.value}/fields`).done(function (data){
               let html = '';
               let champTab = '';
                data.forEach(elt=>{
                   html+=`<option value="${elt}">${elt}</option>`;
                   champTab+=`<label for="${elt}" class="mx-4">
						${elt} <input type="checkbox" id="${elt}" value="${elt}" name="champTab[]">
					</label>`;
               })
                $('#champ').html(html)
					$("#chamTab").html(champTab)
            });
        })
		  $(".flatpickr").flatpickr({mode:'range',dateFormat:'Y-m-d',altFormat:'d-m-Y', date:['{{now()->format("Y-m-d")}}','{{now()->addDays(4)->format("Y-m-d")}}']})
    </script>
@endpush


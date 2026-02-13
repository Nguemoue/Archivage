@extends("templates.templateUser.templateUser")

@section("title")
	Edition d'un dossier
@endsection

@section("content")
	@if($dossier->status != config('traitement.terminer'))
		<div
			class="alert customize-alert alert-dismissible text-primary border border-primary fade show remove-close-icon mx-3"
			role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<div class="d-flex align-items-center font-medium me-3 me-md-0">
				<i class="ti ti-info-circle fs-5 me-2 flex-shrink-0 text-primary"></i>
				Veuillez effectuer tous les traitement pour la validation
				finale!
			</div>
		</div>
	@endif
	<a href="{{ route('traitement.index') }}" class="btn btn-info"><i class="ti ti-arrow-left"></i> Retour</a>

	<div class="mt-4">
		<div class="card-header">
			<h4 class="card-title text-center">Traitement du dossier <b>#{{ $dossier->nom }}</b></h4>
		</div>
		<table class="table table-condensed">
			<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Type</th>
				<th>Status</th>
				<th>Date du dernier traitement</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($dossier->tempDocuments as $item)
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>
						<span>{{ $item->numero }}</span>
					</td>
					<td><img src="{{ asset('icones/'.($item->getFirstMedia()->extension=="application/pdf"?'pdf':'img' ).'.png') }}" alt="icone fichier"
								class="img-fluid"
								width="30"/></td>
					<td>
						@if($item->status == config('traitement.terminer'))
							<strong class="fs-3 text-success"> <i class="ti ti-check font-weight-bold"></i></strong>
						@else
							<span class="text-warning"><icon class="ti ti-line-dotted"></icon></span>
						@endif
					</td>
					<td>-</td>
					<td>
						@if($item->status == config('traitement.terminer'))
							<div class="btn-group">
								<form class="btn btn-sm btn-light-danger"
										onclick="if(confirm('voulez vous recommencer le traitement?')){this.submit()}"
										action="{{route('traitement.document.destroy',[$item->id])}}" method="post">@csrf
									<input type="hidden" name="dossierId" value="{{$dossier->id}}">
									Recommencer
									<i class="ti ti-refresh"></i></form>
							</div>
						@elseif($item->status == config('traitement.encours'))
							<a href="{{ route('traitement.document.show',[$item->id]) }}"
								class="float-right btn-sm text-lowercase border rounded btn btn-light-warning"> <span
									class="tti-player-play"></span>
								continuer le traitement
							</a>
						@else
							<a href="{{ route('traitement.document.show',[$item->id]) }}"
								class="btn btn-sm btn-light-secondary">
								Aller au traitement <i class="ti ti-hand-move"></i>
							</a>
						@endif
					</td>

				</tr>

			@endforeach
			</tbody>
		</table>
		<hr>
		<div class="card-footer mt-2 d-flex justify-content-between">
			@if($dossier->status == config('traitement.terminer'))
				<form id="validAllForm" method="post"
						action="{{route('traitement.dossier-traitement.finish',['id'=>$dossier->id])}}" >
					@csrf
					<input type="hidden" name="copy" id="copyVal" value="0">
					<button id="validAll" type="submit" hreflang="fr" class="btn btn-outline-info text-lowercase">
						<i class="ti ti-player-play"></i>
						Valider tous ses traitements
					</button>
				</form>
				<form id="validAllForm" method="post"
						action="{{route('traitement.dossier.destroy',['id'=>$dossier->id])}}">
					@csrf
					<input type="hidden" name="copy" id="copyVal" value="0">
					<button id="validAll" type="submit"  class="btn btn-outline-danger text-lowercase">
						<i class="ti ti-refresh-off"></i>
						Recommencer tous ses traitements
					</button>
				</form>
			@endif

		</div>
	</div>
@endsection

@push("scripts")
	<script>
		let button = document.getElementById("validAll")
		let copyVal = document.getElementById("copyVal")
		let validAllForm = document.getElementById("validAllForm")
		button.onclick = function (event) {
			let result = confirm("voulez vous conservez une copie du dossier ?")
			if (result) {
				copyVal.value = 1
			} else {
				copyVal.value = 0
			}
			validAllForm.submit()
		}
	</script>
@endpush

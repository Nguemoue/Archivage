<div>
	<h6 class="text-muted mb-2">Etape {{ $step }}: {{$stepName}}</h6>
	<hr>
	@if ($step == 1)
		<form wire:submit.prevent='firstStep'>
			<div class="mb-4">
				<label class="form-label" for="titre">Titre du Document</label>
				<input id="titre" type="text" class="form-control" placeholder="nom du document" wire:model='title'>
			</div>
			<div class="mb-4">
				<label class="form-label" for="type">Type de Document</label>
				<select wire:model.live.change="documentType" id="type" class="form-control">
					<option selected hidden="">---Selectionner une valeur ----</option>
					@foreach ($documentTypes as $item)
						<option value="{{ $item['id'] }}">{{ $item['nom'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-2">
				<label class="form-label" for="soustype">Sous Type de Document
					<span wire:loading wire:target="documentType" class="text-danger">recuperation des sous type ...</span>
				</label>
				<select wire:model='documentSubType' id="soustype" class="form-control">
					<option selected hidden=""> --- Selectionner une valeur ----</option>
					@foreach ($this->documentSubTypes as $item)
						<option value="{{ $item['id'] }}">{{ $item['nom'] }}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary  mt-3"> Suivant <i wire:loading wire:target="firstStep"
																								 class="ti ti-loader"></i> <i
					wire:loading.remove wire:target="firstStep" class="ti ti-arrow-right"></i></button>
		</form>
	@elseif ($step == 2)
		<form method="post" wire:submit.prevent="saveDocumentField" id="formDocumentField"
				olddaction="{{route('traitement.document.updateData',[$document->id])}}">
			@csrf
			{{-- <x-dynamic-component :component="'menu-contextuel' . '-' . Str::lower($sousTypeId)" /> --}}
			{{-- je selectionne tous les champs --}}
			<div class="card">
				<div class="card-header card-border-danger"><h4>Menu Contextuelle {{ $this->contextualMenu }}</h4></div>

				<div class="card-body">
					<div class="p-4">
						@foreach ($this->documentFields as $item)
							<div class="mb-2">
								<x-field :item="$item"/>
							</div>
						@endforeach
						<input type="hidden" value="{{$dossierId}}" name="dossierId">
						<input type="hidden" wire:model="documentFieldData" name="documentFieldData" id="documentFieldData">
					</div>
				</div>
			</div>
			<div class="d-block text-center d-flex justify-content-between mt-2">
				<button type="button" class="btn btn-danger btn-sm" wire:click='prev'>Precedent</button>
				<button type="submit" class="btn btn-primary btn-sm"> suivant</button>
			</div>
		</form>
	@endif

	@if($step == 2)
		<script>
			let form = document.getElementById("form")
			let formData = new FormData()
			form.onsubmit = (event) => {
				event.preventDefault();
				formData = new FormData(form)
				axios.post(form.getAttribute("action"), formData).then(({data}) => {
					location.assign("{{route('traitement.document.finish',[$document->id])}}")
				});
			}
		</script>
	@endif
</div>


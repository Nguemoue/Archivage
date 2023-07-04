@extends("template")

@section("title")
    Edition d'un dossier
@endsection

@section("content")
    <a href="{{ route('traitement.index') }}" class="btn btn-info btn-sm btn-outline-info mb-2"><i class="fa fa-arrow-left"></i> Retour</a>
    <div>
        <div class="card p-2">
            <div class="card-header">
                <h4 class="text-center">Traitement du dossier <b >#{{ $dossier->nom }}</b></h4>
            </div>
            @foreach ($dossier->tempDocuments as $item)
                <div class="border my-2 p-2 ">
                    <img src="{{ asset('icones/'.($item->ext=="pdf"?'pdf':'img' ).'.png') }}" alt="icone fichier"
                         class="img-fluid"
                         width="30"/>
                    <span>{{ $item->numero }}</span>
                    {{-- si le dossier es en cours de traitement--}}
                    @if($item->status == config('traitement.terminer'))
                            <span class="float-right text-success text-lowercase"><i
                                        class="fa fa-check"></i> Traiter avec success</span>
						 @elseif($item->status == config('traitement.encours'))
                            <a href="{{ route('traitement.document.show',[$item->id]) }}"
                               class="float-right btn-sm text-lowercase border rounded btn btn-warning"> <span class="fa fa-play"></span>
                                continuer le traitement
									 </a>
                    @else
                        <a href="{{ route('traitement.document.show',[$item->id]) }}"
                           class="float-right border p-2 btn btn-sm text-lowercase btn-secondary">
									Traiter <i class="fa fa-hand-paper"></i>
								</a>
                    @endif
                </div>
            @endforeach
			  @if($dossier->status == config('traitement.terminer'))

            <div class="card-footer">
                <form id="validAllForm" method="post" action="{{route('traitement.dossier-traitement.finish',['id'=>$dossier->id])}}">
                    @csrf
						 <input type="hidden" name="copy" id="copyVal" value="0">
                    <button id="validAll" type="button" hreflang="fr" class="btn btn-sm btn-outline-info text-lowercase">
                        <i class="fa fa-reply-all"></i>
                        Valider tous ses traitements</button>
                </form>
            </div>
			  @else
				  <div class="alert alert-info alert-dismissible">Veuillez effectuer tous les traitement pour la validation finale!</div>
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
			if(result){
				copyVal.value = 1
			}else{
				copyVal.value = 0
			}
			validAllForm.submit()
		}
	</script>
@endpush

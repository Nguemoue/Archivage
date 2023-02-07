@extends("template")

@section("title")
    Edition d'un dossier
@endsection

@section("content")
    <a href="{{ route('traitement.index') }}" class="btn btn-success btn-sm mb-2">Retour</a>
    <h4 class="text-center">Traitement du dossier <em class="border px-1 code bg-dark rounded text-light">{{ $dossier->nom }}</em></h4>
    <div>
		 <div class="card p-2">
			 @foreach ($dossier->tempDocuments as $item)
				 <div class="border my-2 p-2 ">
					 <img src="{{ asset('icones/'.($item->ext=="pdf"?'pdf':'img' ).'.png') }}" alt="icone fichier" class="img-fluid"
							width="30"/>
					 <span>{{ $item->numero }}</span>
					 {{-- si le dossier es en cours de traitement--}}
					 @if(session()->has("dossier-{$dossier->id}.document-{$item->id}"))
						 <a href="#!" class="float-right border rounded btn-success btn"> <span class="fa fa-play"></span> continuer
							 le traitement</a>
					 @else
						 <a href="{{ route('traitement.document.show',[$item->id]) }}"
							 class="float-right border p-2 btn btn-secondary">traiter ce fichier</a>
					 @endif
				 </div>
			 @endforeach
		 </div>

	 </div>
@endsection

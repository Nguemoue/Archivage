@extends("template")

@section("title")
    Edition d'un dossier
@endsection

@section("content")
    <a href="{{ route('traitement.index') }}" class="btn btn-success btn-sm mb-2">Retour</a>
    <h4 class="text-center">Traitement du dossier <em class="border px-1 code bg-dark rounded text-light">{{ $dossier->nom }}</em></h4>
    <div >
        @livewire("traitement.traitement-dossier",['dossier'=>$dossier])
    </div>
@endsection
@extends("template")

@section("title")
    Edition
@endsection

@section("content")
    <a href="{{ route('traitement.index') }}" class="btn btn-success btn-sm mb-2">Retour</a>
    <div >
        @livewire("traitement.traitement-document",['document'=>$document])
    </div>
@endsection

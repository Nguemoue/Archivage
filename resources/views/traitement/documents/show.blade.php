@extends("template")

@section("title")
    Edition
@endsection

@section("content")
    <a href="{{ route('traitement.index') }}" class="btn btn-success btn-sm mb-2">Retour</a>
    <div >
		 <livewire:traitement.traitement-document :dossier-id="$dossierId" :document="$document"/>
    </div>
@endsection


@push("scripts")
    <script src="{{asset('js/app.js')}}"></script>
@endpush

@extends('template')

@section('content')
    <div class="container-fluid">
        @livewire("classement-view",['dossierId' => $dossier->id])
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

@endpush


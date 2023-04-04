@extends('template')

@section('content')
    <div class="container-fluid">
        @livewire("navigation",['dossierId' => $dossier->id])
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

@endpush


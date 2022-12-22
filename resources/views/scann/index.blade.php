@extends('template')

@section('header')
    {{-- <x-dashboard-header/> --}}
@endsection

@section('content')
    <h4 class="text-center">SCANNER UN OU DES DOCUMENTS / DOSSIERS</h4>
    <hr>
    <br>
    <div class="row">
        <a href="{{ route('scann.document.create') }}" class="btn btn-secondary col-5 p-4">
            <span class="mdi mdi-scanner"></span>
            Effectuer un Scann Sur un Documents
        </a>
        <a href="{{ route('scann.dossier.create') }}" class="btn btn-success col-5 mx-auto p-4">
            <span class="mdi mdi-scanner"></span>
            Effectuer un Scann sur des Dossiers
        </a>
    </div>
@endsection


@push('scripts')
    @livewireScripts
@endpush


@push('styles')
    @livewireStyles()
@endpush

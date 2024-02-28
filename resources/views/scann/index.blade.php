@extends('layouts._materializev2._materializev2')

@section('header')
    {{-- <x-dashboard-header/> --}}
@endsection

@section('content')
    <h4 class="text-center">SCANNER UN OU DES DOCUMENTS / DOSSIERS</h4>
    <hr>
    <br>
    <div class="row">
        <a href="{{ route('scann.dossier.create') }}" class="btn btn-success col-11 mx-auto p-4">
            <span class="mdi mdi-scanner"></span>
			  Poursuivre le traitement pour Scanner le Dossier
        </a>
    </div>
@endsection


@push('scripts')
    @livewireScripts
@endpush


@push('styles')
    @livewireStyles()
@endpush

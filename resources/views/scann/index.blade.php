@extends("template")

@section("header")
    Page de scann
    {{-- <x-dashboard-header/> --}}
@endsection

@section("content")
    <h4 class="text-center">Phase de Scannage de Document</h4>
    <a href="{{ route('scann.create') }}" class="btn btn-secondary">
        <span class="mdi mdi-scanner"></span>
        Effectuer un Scann
    </a>
@endsection


@push("scripts")
    @livewireScripts
@endpush


@push("styles")
    @livewireStyles()
@endpush
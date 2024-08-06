@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container-fluid">

        <livewire:navigation-classement :classements="$classements"/>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


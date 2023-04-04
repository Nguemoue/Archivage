@extends('template')

@section('content')
    <div class="container-fluid">
        @livewire("navigation-classement")
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

@endpush


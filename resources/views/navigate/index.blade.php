@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container-fluid">
        <livewire:navigation-classement :classements="$classements"/>
    </div>
@endsection

@push('styles')
	<style>
		.navigation-folder{
			font-size:4em;
		}
	</style>
@endpush
@push('scripts')
{{--    @vite(['resources/js/app.js'])--}}
@endpush


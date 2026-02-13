@extends('templates.templateUser.templateUser')

@section('content')
	<div class="container-fluid">
		<livewire:classement-view :dossier-id="$dossier->id" :classements="$classements"/>
	</div>
@endsection

@push('scripts')
	@vite('resources/js/app.js')
@endpush


@extends('template_admin')

@section('content')
	<div class="container-fluid">
		@livewire("admin-nav-classement",['classements'=>$classements])
	</div>
@endsection

@push('scripts')

@endpush


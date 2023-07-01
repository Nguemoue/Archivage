@extends('template')

@section('content')
	<div class="text-center">
		<h2 class="text-underline">Page D'accueil</h2>
	</div>
	<hr>
	<div class="row"
		  style="font-family: 'Algerian',serif;letter-spacing: 2px;font-size: 5em;font-weight: bolder">
		@can(config('perm_names.SCAN_DOC'))
			<div class="col-md-6  col-sm-12 my-2">
				<a href="{{ route('scan.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-success">
					<span class="fa fa-folder-open fa-2x"></span>
					Récupération des fichiers scannés
				</a>
			</div>
		@endcan
		@can(config('perm_names.TRAIT_DOC'))
			<div class="col-md-6  col-sm-12 my-2">
				<a href="{{ route('traitement.index') }}" style="line-height: 100px;"
					class="w-100 btn btn-outline-secondary">
					<span class="fa fa-pencil fa-2x"></span>
					Traitement
				</a>
			</div>
		@endcan

	</div>
	<div class="row">
		@can(config('perm_names.NAV'))

			<div class="col-md-6  col-sm-12 my-2">
				<a href="{{ route('navigation.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-info">
					<span class="fa fa-navicon fa-2x"></span>
					Navigation
				</a>
			</div>
		@endcan
		@can(config('perm_names.SHOW_STAT'))
			<div class="col-md-6  col-sm-12 my-2">
				<a href="{{ route('statistique.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-danger">
					<span class="fa fa-book fa-2x"></span>
					Statistiques
				</a>
			</div>
		@endcan

	</div>
@endsection

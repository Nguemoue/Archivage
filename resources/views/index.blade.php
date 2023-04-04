@extends('template')

@section('content')
	<div class="text-center">
		<h2 class="text-underline">Page D'acceuil</h2>
	</div>
	<hr>
    <div class="row gap-1  border" style="gap:4px 0px;font-family: 'Algerian',serif;letter-spacing: 2px;font-size: 5em;font-weight: bolder">
        <div class="col-6">
            <a href="{{ route('scan.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-success">
                <span class="fa fa-folder-open fa-2x"></span>
                Scanner les documents
            </a>
        </div>
        <div class="col-6">
            <a href="{{ route('traitement.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-secondary">
                <span class="fa fa-pencil fa-2x"></span>
                Effectuer un traitement
            </a>
        </div>
    </div>
    <hr class="my-4">
    <div class="row">

        <div class="col-6">
            <a href="{{ route('navigation.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-info">
                <span class="fa fa-navicon fa-2x"></span>
                Navigation
            </a>
        </div>
        <div class="col-6">
            <a href="{{ route('statistique.index') }}" style="line-height: 100px;" class="w-100 btn btn-outline-danger">
                <span class="fa fa-book fa-2x"></span>
                Statistiques
            </a>
        </div>
    </div>
@endsection

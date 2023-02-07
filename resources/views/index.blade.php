@extends('template')

@section('content')
	<div class="text-center">
		<h3>Page D'acceuil</h3>
	</div>
	<hr>
    <div class="row gap-1 align-items-stretch border" style="font-family: 'Algerian',serif;letter-spacing: 2px;font-size: 5em;font-weight: bolder">
        <a href="{{ route('scan.index') }}" style="line-height: 100px;" class="col col-6 btn btn-success">
            <span class="fa fa-folder-open fa-2x"></span> Scanner les documents
        </a>
        <a href="{{ route('traitement.index') }}" style="line-height: 100px;" class="col col-6 btn btn-outline-secondary">
            <span class="fa fa-pencil fa-2x"></span> Effectuer un traitement
        </a>
    </div>
@endsection

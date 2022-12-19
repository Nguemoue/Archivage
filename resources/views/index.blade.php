@extends('template')

@section('content')
    <div class="row gap-1">
        <a href="{{ route('scan.index') }}" class="col col-5 btn btn-success">
            Scanner les documents
        </a>
        <a href="#" class="col col-5 btn btn-warning">
            Effectuer un traitement
        </a>
    </div>
@endsection

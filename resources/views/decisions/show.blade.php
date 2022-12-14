@extends("template")

@section("header")
    <x-dashboard-component :chemin="['Fichier',$decision->fichier->nom,'Decision']" :titre="'Decision'"
          :description="'decision pour le fichier de nature '.$decision->nature " />
@endsection
@section("content")
        <a href="{{ route('fichiers.index') }}" class="mb-4 btn btn-success">
            <span class="fa fa-arrow-circle-left"></span>
        </a>
        <div class="card">
            <div class="card-header">Information sur la decision du fichier {{ $decision->fichier->nom }}</div>
            <div class="card-body">
                <h4>Code : {{ $decision->code }}</h4>
                <hr>
                <h4>Nature : {{ $decision->nature }}</h4>
            </div>
        </div>
@endsection
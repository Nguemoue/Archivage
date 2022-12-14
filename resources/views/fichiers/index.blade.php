@extends("template")


@section("content")
    <h1 class="text-center">Liste des fichiers</h1>
    <hr>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Les Fichiers en Stockage</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Numero d'identification</th>
                        <th>Nom</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichiers as $fichier)
                        <tr>
                            <td>{{ $fichier->numero }}</td>
                            <td>{{ $fichier->nom }}</td>
                            <td>{{ $fichier->created_at->isoformat('lll') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn fa fa-download"></a>
                                    <a href="#" class="btn fa fa-pencil"></a>
                                    @if ($fichier->decision)
                                        <a href="{{ route('fichiers.decision.index',['fichier'=>$fichier->numero]) }}" class="btn fa fa-eye"></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
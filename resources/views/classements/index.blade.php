@extends('template')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Listes des dossier principaux de classemt</h2>
        <hr>
        <div class=" text-right mb-2">
            <a href="{{ route('classement.create') }}" class="btn btn-success">Ajouter un nouveau dossier type</a>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title text-center">Liste des dossiers types enregistrees</h4>
            </div>
            <div class="card-footer">
                @includeIf('_partials.errors')
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Nombre de sous Type</th>
                            <th>Date de creation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classements as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nom }}</td>
                                <td class="text-center"><span class="badge text-white p-2 bg-secondary">{{ $item->sous_classements_count }}</span></td>
                                <td>{{ $item->created_at->IsoFormat('ll') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-sm btn-danger text-white">
                                        <form onclick="submit()" action="{{ route('classement.destroy',['classement'=>$item->id]) }}" method="POST" id="delete">
                                            @csrf @method('DELETE')
                                            <span class="text-white">delete</span>
                                        </form>
                                    </a>
                                        <a href="{{ route('classement.edit',['classement'=>$item->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-warning">
                                acucune donnes trouvee
                            </div>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

@endpush


@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Listes des Sous Dossier de {{$classement->nom}}</h2>
        <hr>
        <div class=" text-right mb-2">
            <a href="{{ route('classement.sousclassement.create',['classement'=>$classement->id]) }}" class="btn btn-success">Ajouter un nouveau sous type</a>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title text-center">Liste des Sous Dossier pour ce type enregistrees</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
            </div>
            <div class="card-footer">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Date de creation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sousclassements as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nom }}</td>
                                <td>{{ $item->created_at->IsoFormat('lll') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-sm btn-danger text-white ">
                                        <form onclick="submit()" action="{{ route('classement.sousclassement.destroy',['classement'=>$classement->id,'sousclassement'=>$item->id]) }}" method="POST" id="delete">
                                            @csrf @method('DELETE')
                                            <span class="text-white">delete</span>
                                        </form>
                                    </a>
                                        <a href="{{ route('classement.sousclassement.edit',[$classement->id,$item->id]) }}" class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
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

@push('styles')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

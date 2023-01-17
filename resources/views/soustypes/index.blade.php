@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Creer Un Nouveau sous type</h2>
        <hr>
        <div class=" text-right mb-2">
            <a href="{{ route('soustype.create') }}" class="btn btn-success">Ajouter un nouveau sous type</a>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title text-center">Liste des types enregistrees</h4>
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
                            <th>Type</th>
                            <th>Date de creation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sousTypes as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nom }}</td>
                                <td>{{ optional($item->type)->nom??"Non defini" }}</td>
                                <td>{{ $item->created_at->IsoFormat('lll') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-sm btn-danger text-white ">
                                        <form onclick="submit()" action="{{ route('soustype.destroy',['soustype'=>$item->id]) }}" method="POST" id="delete">
                                            @csrf @method('DELETE')
                                            <span class="text-white">delete</span>
                                        </form>
                                    </a>
                                        <a href="{{ route('soustype.edit',['soustype'=>$item->id]) }}" class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                                    <a href="{{ route('soustype.fields.index',['soustype'=>$item->id]) }}" class="btn btn-secondary"><span class="fa fa-cogs"></span></a>
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

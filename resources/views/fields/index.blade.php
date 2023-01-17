@extends('template')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Liste des champs de <em>{{ $soustype->nom }}</em>  </h2>
        <hr>
        <div class=" text-right mb-2">
            <a href="{{ route('soustype.fields.create',['soustype'=>$soustype->id]) }}" class="btn btn-success">Ajouter un nouveau champs</a>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title text-center">Liste des Champt de </h4>
            </div>
            <div class="card-footer">
                @includeIf('_partials.errors')
            </div>
            <div class="card-body">
                <table class="table table-hover  table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Min | Defaut | Max</th>
                            <th>Preview</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fields as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nom }}</td>
                                <td class="text-center">
                                    @if ($item->nom != "textarea")
                                    <span class="badge bg-secondary badge-md">  
                                        {{ $item->type }}
                                    </span>
                                    @endif
                            </td>
                                <td ><span class="border bg-light rounded p-1">{{ $item->min }}</span> | 
                                    <span class="border bg-light rounded p-1">{{ $item->value }}</span> |
                                    <span class="border bg-light rounded p-1">{{ $item->max }}</span></td>
                                <td> <x-field :item="$item"/> </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-sm btn-danger text-white">
                                        <form onclick="submit()" action="{{ route('soustype.fields.destroy',['soustype'=>$soustype->id,'field'=>$item->id]) }}" method="POST" id="delete">
                                            @csrf @method('DELETE')
                                            <span class="text-white">delete</span>
                                        </form>
                                    </a>
                                        <a href="{{ route('soustype.fields.edit',['soustype'=>$soustype->id,'field'=>$item->id]) }}" class="btn btn-sm btn-success">Edit</a>
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

@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Creer Un Nouveau type</h2>
        <hr>
        <div class=" text-right mb-2">
			  <button data-bs-target="#addModal" data-bs-toggle="modal" class="btn btn-success">Ajouter <i class="ti ti-plus"></i></button>
			  <x-app.modal modal-id="addModal">
				  <x-slot name="header"><h4>Nouveau type</h4></x-slot>
				  @include('types.createModal')
			  </x-app.modal>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title  text-center">Liste des types enregistrees</h4>
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
                            <th>Description</th>
                            <th>Date de creation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->nom }}</td>
                                <td class="text-center"><a href="#!" class="btn btn-sm bg-secondary">{{ $item->sous_types_count }}</a></td>
                                <td>{!!  Str::words($item->description, 3, '...') !!}</td>
                                <td>{{ $item->created_at->IsoFormat('ll') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-sm btn-danger text-white">
                                        <form onclick="submit()" action="{{ route('type.destroy',['type'=>$item->id]) }}" method="POST" id="delete">
                                            @csrf @method('DELETE')
                                            <span class="text-white">delete</span>
                                        </form>
                                    </a>
                                        <a href="{{ route('type.edit',['type'=>$item->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

@endpush


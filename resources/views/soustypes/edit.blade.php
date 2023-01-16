@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Editer Un Nouveau sous Type</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire d'edition d'un nouveau type</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset >
                    <form action="{{ route('soustype.update',['soustype'=>$sousType->id] ) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du Sous Type</label>
                            <input type="text" name="nom" class="form-control"
                                placeholder="Entrez le nom du type" value="{{ $sousType->nom }}" />
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label"> Type</label>
                            <select name="type_document_id" id="type_document_id" class="border fom-select form-control">
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $sousType->type_document_id) selected @endif >{{ $item->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">
                                Description
                            </label>
                            <textarea name="description" class="form-control" id="description" cols="10" rows="10">{{ $sousType->description }}</textarea>
                        </div>
       
                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-send"></span>
                            Metre a jour
                        </button>

                    </form>
                </fieldset>
            </div>
            <div class="card-footer">

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

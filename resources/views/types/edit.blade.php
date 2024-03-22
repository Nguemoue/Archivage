@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container">
        <h2 class="text-center">Editer Un Nouveau type</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire d'edition d'un nouveau type</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset >
                    <form action="{{ route('type.update',['type'=>$type->id] ) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du type</label>
                            <input type="text" name="nom" class="form-control"
                                placeholder="Entrez le nom du type" value="{{ $type->nom }}" />
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">
                                Description
                            </label>
                            <textarea name="description" class="form-control" id="description" cols="10" rows="10">{{ $type->description }}</textarea>
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

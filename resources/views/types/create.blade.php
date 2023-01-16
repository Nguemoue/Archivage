@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Creer Un Nouveau type</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire de creation d'un nouveau type</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset x-data="{ open: false, mime: 'image/*' }">
                    <form action="{{ route('type.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du type</label>
                            <input type="text" name="nom" class="form-control"
                                placeholder="Entrez le nom du type" value="{{ old('nom') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">
                                Description
                            </label>
                            <textarea name="description" class="form-control" id="description" cols="10" rows="10">{{ old('description') }}</textarea>
                        </div>
       
                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-send"></span>
                            Enregistrer
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

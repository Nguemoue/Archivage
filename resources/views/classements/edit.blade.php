@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire d'edition d'un nouveau type de classement</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset >
                    <form action="{{ route('classement.update',['classement'=>$classement->id] ) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du type</label>
                            <input type="text" name="nom" class="form-control"
                                placeholder="Entrez le nom du type" value="{{ $classement->nom }}" />
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">
                                Selectionner son Ordre
                            </label>
                            <select name="ordre" class="form-control form-select border" id="ordre" >
                                @foreach($ordreClassements as $ordreClassement)
                                    <option value="{{$ordreClassement}}">{{$ordreClassement}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <span class="ti ti-send"></span>
                            Metre a jour
                        </button>
                    </form>
                </fieldset>
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

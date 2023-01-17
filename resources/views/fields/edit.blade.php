@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Page D'edition du field</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire d'edition d'un Field</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset x-data="{selectedNom:'input'}">
                    <form action="{{ route('soustype.fields.update',['soustype'=>$soustype->id,'field'=>$field->id]) }}"  method="POST">
                        @csrf
                        @method("PUT")
                        <div class="mb-2">
                            <label for="nom">Selectionner la form de votre element <span class="text-danger">*</span> </label>
                            <select name="nom" x-model="selectedNom" required id="nom" class="form-control form-select border">
                                <option value="input" {{ ($field->nom == "input")?'selected':''}}> Zone de Saisie [ input ]</option>
                                <option value="textarea" {{ ($field->nom == "textarea")?'selected':''}}> Zone de Texte [ textarea ]</option>
                            </select>
                        </div>
                        <div class="mb-2" x-transition x-show="selectedNom =='input'">
                            <label for="type">Selectionner le Fomat <span class="text-danger">*</span>  </label>
                            <select name="type" id="type" required class="form-control form-select border">
                                <option value="date" {{  ($field->nom == "date") ?'selected':''}} > Date </option>
                                <option value="datetime"> Date et heure </option>
                                <option value="color"> Couleur </option>
                                <option value="text"> Texte </option>
                                <option value="email"> Email </option>
                                <option value="password"> Mot de passe </option>
                                <option value="search"> Recherche </option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="label">En tete</label>
                            <input type="text" name="label" value="{{ $field->label }}" id="label" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="label">Placeholder</label>
                            <input type="text" name="placeholder" id="placeholder" value="{{$field->placeholder}}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="class">Classe CSS</label>
                            <input value="{{$field->class}}" type="text" name="class" id="classe" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="class">Valeur Mininale</label>
                            <input type="text" name="min" value="{{ $field->min }}" id="classe" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="class">Valeur Par Defaut</label>
                            <input type="text" name="value" id="classe" value="{{ $field->value }}" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="class">Valeur Maximale</label>
                            <input type="text" name="max" id="classe" class="form-control" value="{{ $field->max }}">
                        </div>
                        <div class="mb-2">
                            <label for="class">Ce champs est t'il obligatoire ?</label>
                            <br>
                            <label for="oui"><input id="oui" class="form-radio form-check" checked type="radio" name="required">Oui</label>
                            <label for="non"><input id="non" type="radio" class="form-radio form-check" name="required">Non</label>
                        </div>
                        <button class="btn btn-success btn-sm" type="submit"><span class="fa fa-pencil"></span> &nbsp;Enregistrer</button>
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

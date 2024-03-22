@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container">
        <h2 class="text-center">Creer Un Nouveau Field</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire de creation d'un nouvel Field</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset x-data="{selectedNom:'input'}">
                    <form action="{{ route('soustype.fields.store',['soustype'=>$soustype->id]) }}"  method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="nom">Selectionner la form de votre element <span class="text-danger">*</span> </label>
                            <select name="nom" x-model="selectedNom" required id="nom" class="form-control form-select border">
                                <option value="input"> Zone de Saisie [ input ]</option>
                                <option value="textarea"> Zone de Texte [ textarea ]</option>
                            </select>
                        </div>
                        <div class="form-group mb-3" x-transition x-show="selectedNom =='input'">
                            <label class="form-label" for="nom">Selectionner le Fomat <span class="text-danger">*</span>  </label>
                            <select name="type" id="nom" required class="form-control form-select border">
                                <option value="date"> Date </option>
                                <option value="datetime"> Date et heure </option>
                                <option value="color"> Couleur </option>
                                <option value="text"> Texte </option>
                                <option value="email"> Email </option>
                                <option value="password"> Mot de passe </option>
                                <option value="search"> Recherche </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="label">En tete</label>
                            <input type="text" name="label" id="label" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="placeholder">Placeholder</label>
                            <input type="text" name="placeholder" id="placeholder" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Name Attributes</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="cssClass">Classe CSS</label>
                            <input type="text" name="class" id="cssClass" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="min">Valeur Mininale</label>
                            <input type="text" name="min" id="min" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="default">Valeur Par Defaut</label>
                            <input type="text" name="value" id="default" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="max">Valeur Maximale</label>
                            <input type="text" name="max" id="max" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="class" >Ce champs est t'il obligatoire ?</label>
                            <br>
									<div class="form-check form-check-inline">
										<input class="form-check-input primary check-outline outline-primary" type="radio" name="radio-primary" id="yes" value="1" checked>
										<label  class="form-check-label" for="yes">Oui</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input primary check-outline outline-danger" type="radio" name="radio-primary" id="none" value="0" >
										<label  class="form-check-label" for="none">Non</label>
									</div>

                        </div>
                        <button class="btn btn-success" type="submit"><span class="ti ti-send"></span> &nbsp;Enregistrer</button>
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

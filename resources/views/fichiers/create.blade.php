@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Creer Un Nouveau Fichier</h2>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire de creation d'un nouveau fichier</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
                <fieldset x-data="{ open: false, mime: 'image/*' }">
                    <form action="{{ route('fichiers.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom">Nom du Fichier</label>
                            <input type="text" name="nom" class="form-control"
                                placeholder="Entrez le nom du fichier" />
                        </div>
                        <div class="mb-3">
                            <label for="nom">Type de fichier</label>
                            <select class="form-control border" x-model="mime" name="typeFichier" id="typeFichier">
                                <option value="image/*">Fichier Image</option>
                                <option value="application/pdf">Fichier PDF</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fichier" class="btn btn-danger btn-sm">
                                <span class="fa fa-hand-grab-o"></span>
                                Choisir le fichier
                            </label>
                            <input type="file" name="fichier" x-bind:accept="mime" class="d-none" id="fichier">
                        </div>
                        <div class="mb-3">
                            <label for="decision"><input x-model="open" name="decision" type="checkbox"
                                    class="form-check-inline" id="decision"> Decision ? </label>
                        </div>

                        <div x-transition class="mb-3" x-show="open">
                            <div class="mb-2">
                                <label for="code">Code de la decision</label>
                                <input type="text" name="decision.code" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <label for="nature">Nature</label>
                                <input type="text" class="form-control" name="decision.nature">
                            </div>
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

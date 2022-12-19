<div class="card">
    <div class="card-header">
        Nouveau Scann
    </div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ('images')
            <div class="row border">
                @foreach ($images as $item)
                    <div class="col">
                        <img src="{{ $item->temporaryUrl() }}" alt=".." width="200" class="img-fluid" />
                    </div>
                @endforeach
            </div>
        @endif

        <form wire:submit.prevent='submit' enctype="multipart/form-data">
            @error('images.*')
                <span class="error">{{ $message }}</span>
            @enderror

            <div class="text-danger p-2" wire:loading wire:target="images">chargement de la previsualisation des images
            </div>

            <div class="mb-3">
                <label for="Titre">Titre du {{ $type }}</label>
                <input type="text" name="titre" id="titre" wire:model.defer='titre'
                    class="form-control border">
                @error('titre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type">Type </label>
                <select name="type" id="type" wire:model='type' class="form-control border form-select">
                    <option value="dossier">Dossier</option>
                    <option value="document">Document</option>
                </select>
            </div>
            @if ($type == 'dossier')
                <div class="mb-4">
                    <label for="genre">Selectionner le genre de dossier</label>
                    <select name="genre" id="genre" wire:model="genre" class="form-control border">
                        <option value="acte">Actes</option>
                        <option value="decision">Decision</option>
                        <option value="projet">Projet</option>
                        <option value="proces">Process</option>
                        <option value="note">Notes</option>
                        <option value="rapport">Rapport</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="liste" class="btn btn-secondary btn-sm text-lowercase">vos fichiers ici</label>
                    <input type="file" id="liste" wire:model="images" name="images[]" class="form-file d-none"
                        accept="image/*" multiple>
                </div>
                {{-- information ou menu contextion --}}
                <x-dynamic-component :component="'menu-contextuel' . '-' . $genre" />
            @elseif ($type == 'document')
                <div class="mb-3">
                    <label for="file" class="control-label">Selectionner les fichier a transferer
                        <span class="text-danger badge bg-warning"
                            title="vous pouvez selectionner plusieurs documents en maintenant la touche control enfonce">
                            details
                        </span>
                    </label>
                    <input type="file" name="images[]" class="form-control" wire:model='images' accept="image/*"
                        multiple title="selectionner plusieur fichier" />
                </div>
            @endif
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Envoyer les {{ $type }}</button>
            </div>
        </form>
    </div>
    <div class="card-footer">

    </div>
</div>

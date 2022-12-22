<div>
    <div class="card-footer">
        <p>
            Actions
        </p>
        <a href="#" class="btn btn-danger btn-sm">Annuler le traitement</a>
        <a href="#" class="btn btn-secondary btn-sm">voir le fichier</a>
    </div>
    <hr>
    <p class="border bg-dark text-light p-2">
        Etape {{ $step }}
    </p>
    <div class="p-2 border">
        @if ($step == 1)
            <form wire:submit.prevent='firstStep'>
                <div class="mb-4">
                    <label for="titre">Titre du Document</label>
                    <input type="text" class="form-control" placeholder="nom du document" wire:model.defer='titre'>
                </div>
                <div>
                    <label for="type">Type de Document</label>
                    <select wire:model.defer='type' id="type" class="form-control">
                        <option value="acte">Actes</option>
                        <option value="decision">Decision</option>
                        <option value="projet">Projet</option>
                        <option value="note">Notes</option>
                        <option value="rapport">Rapport</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3"> suivant </button>
            </form>
        @elseif ($step == 2)
            <form wire:submit.prevent='secondStep'>
                <x-dynamic-component :component="'menu-contextuel' . '-' . $type" />
                <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-sm" wire:click='prev'>Precedent</button>
                    <button type="submit" class="btn btn-primary btn-sm"> suivant </button>
                </div>
            </form>
        @elseif ($step == 3)
            <form wire:submit.prevent='thirdStep'>
                <div class="mt-2">
                    <button type="button" class="btn p-3 btn-sm" wire:click='prev'>Page precedent Precedent</button>

                    <button type="submit" class="btn p-3 btn-primary btn-sm"> validation finale </button>
                </div>
            </form>
        @endif
    </div>


</div>

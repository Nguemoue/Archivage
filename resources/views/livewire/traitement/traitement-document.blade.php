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
                <div class="mb-4">
                    <label for="type">Type de Document</label>
                    <select wire:model='typeId' id="type" class="form-control" wire:change='updateSousType'>
                        @foreach ($type as $item)
                            <option value="{{ $item['id'] }}">{{ $item['nom'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="soustype">Sous Type de Document</label>
                    <select wire:model.defer='sousTypeId' id="soustype" class="form-control">
                        @foreach ($soustype as $item)
                            <option value="{{ $item['id'] }}">{{ $item['nom'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3"> suivant </button>
            </form>
        @elseif ($step == 2)
            <form wire:submit.prevent='secondStep'>
                {{-- <x-dynamic-component :component="'menu-contextuel' . '-' . Str::lower($sousTypeId)" /> --}}
                {{-- je selectionne tous les champs --}}
                <div class="card">
                    <div class="card-header card-border-danger"><h4>Menu Contextuel {{ $menuContextuel }}</h4></div>
                    <div class="card-body">
                        <div class="p-4">
                                @foreach ($fields as $item)
                                <div class="mb-2">
                                    <x-field :item="$item" />
                                </div>
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                <div class="d-block text-center d-flex justify-content-between mt-2">
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

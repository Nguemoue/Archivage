<div class="card">
    <div class="card-header">
        <h4 class="card-title text-center">Ordre de Classements</h4>
    </div>
	@if(session()->has("success"))
		<div class="alert alert-success w-75 mx-auto">
			Enregistrement Efectuer avec success
		</div>
	@endif
    <div class="card-body border ">
        @if($depth == 1)
            <div class="row gap-1 p-1">

                @foreach($classements as $classement)
                    <div class="d-flex px-2 flex-column m-3">
                        <a wire:click='loadSousClassement({{$classement->id}})' href="#!">
                            <span class="fa fa-folder fa-4x text-warning"></span>
                        </a>
                        <h6 class="font-bold">{{$classement->nom}}</h6>
                    </div>
                @endforeach
            </div>
        @elseif($depth == 2)
            <div class="card">
                <div class="card-footer d-flex justify-content-between">
                    <button wire:click='setDepth(1)' class="btn btn-outline-info"><i class="fa fa-arrow-left"></i>
                    </button>
                    <h6 class="card-title">
                        Sous Dossier de <b>{{$currentClassement->nom}}</b>
                    </h6>
                </div>
                <hr>
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col col-5">
                            @foreach($sousClassements as $sousClassement)
                                <div class="d-flex flex-column">
                                    <a wire:click='setSousDepth(true,{{$sousClassement->id}})' href="#">
                                        <i class="fa fa-folder text-warning fa-3x"></i>
                                    </a>
                                    <i>{{$sousClassement->nom}}</i>
                                </div>
                            @endforeach
                        </div>
                        @if($sousDepth)
                            <div class="col-7  right-0" style="right: 0;top: 0">
                                <div class="card">
                                    <div class="card-footer">
                                        <h6>Contenu du dossier #{{$currentSousClassement}}.</h6>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div wire:loading class="text-danger">
                                            recuperation du contenu ...
                                        </div>
                                        @foreach($sousDirectories as $key => $sousDirectory)

                                            <div class="dropdown border p-2" style="cursor: pointer">
                                                <div data-toggle="dropdown" class="dropdown-toggle"
                                                     id="dropDownMenu{{$key}}"

                                                >
                                                    <i class="fa fa-folder fa-2x text-warning mx-2"></i>
                                                    <span class="">
                                                    {{\Illuminate\Support\Arr::last(explode("/",$key))}}
                                                    <b class="text-bold font-bold"> ({{count($sousDirectory)}}</b> Fichiers)
                                                    </span>
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$key}}">
                                                    <ul class="list-unstyled px-2">
                                                        @foreach($sousDirectory as $sousDirect)
                                                            <li class="my-2">
                                                                <i class="fa fa-file"></i>
                                                                <em>{{\Illuminate\Support\Arr::last(explode("/",$sousDirect))}}</em>
                                                            </li>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="card-footer">
                                        <button onclick="confirm('Voulez vous telecharger dans ce dossier ?') || event.stopImmediatePropagation()"
                                                class="btn btn-sm btn-primary" wire:click="download()">
                                            <i class="fa fa-download"></i> Enregistrer ici
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>

            </div>
        @endif
    </div>
</div>

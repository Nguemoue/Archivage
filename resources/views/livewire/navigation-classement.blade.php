<div>
	<div class="border p-2 border-black">
		@if($depth === 1)
			<div class="d-flex flex-end">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="....">
					<button class="btn btn-outline-dark input-group-append">Rechercher <i class="ti ti-search"></i></button>
				</div>
			</div>
			<div class="position-absolute right-0 text-danger" wire:target="loadSousClassement" wire:loading>
				<i class="ti ti-loader"></i> Chargement...
			</div>
			<div class="d-flex flex-wrap">
				@foreach($classements as $classement)
					<x-navigation.folder :name="$classement->nom" wire:click="loadSousClassement({{$classement->id}})" />
				@endforeach
			</div>
		@elseif($depth === 2)
			<div >
				<div class="card-footer d-flex justify-content-between">
					<button wire:click='setDepth(1)' class="btn btn-outline-info"> <span wire:loading wire:target="setDepth">...</span>	 <i class="ti ti-arrow-left"></i></button>
					<h6 class="card-title">
						Sous Dossier de <b>{{$currentClassement->nom}}</b>
					</h6>
				</div>
				<hr>
				<div class="d-flex flex-end mb-3">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="....">
						<button class="btn btn-outline-dark input-group-append">Rechercher <i class="ti ti-search"></i></button>
					</div>
				</div>
				<div class="card-body position-relative">
					<div class="row">
						<div class="col-sm-4 col-md-2 col-xl-2">
							@forelse($sousClassements as $sousClassement)
								<x-navigation.folder :name="$sousClassement->nom" wire:click='setSousDepth(true,{{$sousClassement->id}})'/>
							@empty
								<h3>Vide...</h3>
							@endforelse

						</div>
						<div class="col-md-10 col-xl-10 col-sm-8 border-2 right-0" style="right: 0;top: 0">
							<div  wire:loading wire:target="setSousDepth" class="text-danger "> <i class="ti ti-loader"></i> ...</div>
							@if($sousDepth)
								<div class="border">
									<div>
										@foreach($sousDirectories as $key => $dossier)
											<div class="jumbotron border p-2" style="cursor: pointer">
												<a data-bs-toggle="collapse" class=""
													data-bs-target="#dropDownMenu{{$dossier->id}}">
													<i class="ti ti-folder navigation-folder text-warning mx-2"></i>
													<span class="text-wrap" style="max-width: 100px;">
                                                    {{$dossier->nom}}
                                                    <b class="text-bold font-bold"> ({{($dossier->documents->count())}}</b> Fichiers)
													</span>
												</a>
												<hr class="my-1">
												<div class="collapse" id="dropDownMenu{{$dossier->id}}">
													<ul class="list-unstyled px-2">
														@foreach($dossier->documents as $sousDirect)
															<div>
																<li title="voir les details sur le fichiers"
																	 class="d-flex justify-content-between my-2">
                                                                <span><i class="ti ti-file"></i>
                                                                <em>{{$sousDirect->nom}}</em></span>
																	<div class="btn-group">
																		<a data-bs-toggle="modal" href="#modalFile{{$sousDirect->id}}"
																			class="btn btn-sm btn-outline-info">Menu contextuel<i class="ti ti-file-symlink"></i></a>
																		<a data-bs-toggle="modal" href="#modalPreview{{$sousDirect->id}}"
																			class="btn btn-sm btn-primary">
																			Previsualiser <i class="ti ti-eye"></i>
																		</a>
																	</div>
																</li>
																{{-- pour la modal --}}
																<x-navigation.modal  :document="$sousDirect"
																							id="modalFile{{$sousDirect->id}}"/>
																<x-navigation.modal-preview  :document="$sousDirect"
																									  id="modalPreview{{$sousDirect->id}}"/>
															</div>
															{{--<div>
																<button data-bs-toggle="modal" data-bs-target="#modalNewFile{{$sousDirect->id}}" class="btn btn-sm btn-primary" type="button"><i class="ti ti-plus"></i> Ajouter document</button>
															</div>--}}
															{{-- pour la modal d'ajout --}}
															{{--<div class="modal fade" id="modalNewFile{{$sousDirect->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLongTitle">Ajouter d'un document </h5>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<form>
																				@csrf
																				<div class="form-group mb-3">
																					<label for="file">Fichier a selectionner</label>
																					<input type="file" class="custom-file form-control">
																				</div>
																				<div class="form-group">
																					<label for="nom">Nom du document</label>
																					<input type="text" placeholder="nom du document" class="form-control">
																				</div>
																			</form>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
																		</div>
																	</div>
																</div>
															</div>--}}
														@endforeach

													</ul>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							@endif
						</div>

					</div>
				</div>
			</div>
		@endif
	</div>

</div>

<div class="card">
	<div class="card-header">
		<h4 class="card-title text-center">Navigation Dans les dossiers</h4>
	</div>
	<div class="card-body border ">
		@if($depth == 1)
			<div class="row gap-1 p-1">
				@foreach($classements as $classement)
					<div class="d-flex px-2 flex-column m-3">
						<a wire:click='loadSousClassement({{$classement->id}})' href="#!">
							<span class="ti ti-folder fa-4x text-warning"></span>
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
								<div class="border bg-secondary">
									<div class="card-body">
										<div wire:loading class="text-danger">
											recuperation du contenu ...
										</div>
										@foreach($sousDirectories as $key => $dossier)

											<div class="jumbotron border p-2" style="cursor: pointer">
												<a data-toggle="collapse" class=""
													data-target="#dropDownMenu{{$dossier->id}}">
													<i class="fa fa-folder fa-2x text-warning mx-2"></i>
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
                                                                <span><i class="fa fa-file"></i>
                                                                <em>{{$sousDirect->nom}}</em></span>
																<div class="btn-group">
																	<a data-toggle="modal" href="#modalFile{{$sousDirect->id}}"
																		class="btn btn-sm btn-outline-info"><i class="fa fa-sync"></i></a>
																	<a data-toggle="modal" href="#modalPreview{{$sousDirect->id}}"
																		class="btn btn-sm btn-primary">
																		<i class="fa fa-eye"></i>
																	</a>
																</div>
															</li>
															{{-- pour la modal --}}
															<x-navigation.modal  :document="$sousDirect"
																					  id="modalFile{{$sousDirect->id}}"/>
															<x-navigation.modal-preview  :document="$sousDirect"
																								 id="modalPreview{{$sousDirect->id}}"/>
															</div>
															@endforeach
															<div><a data-toggle="modal" data-target="#modalNewFile{{$sousDirect->id}}" class="btn btn-primary" href="#">ajouter un documents</a></div>
															{{-- pour la modal d'ajout --}}
															<div class="modal fade" id="modalNewFile{{$sousDirect->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLongTitle">Ajouter d'un document </h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form action="#!">
																				@csrf
																				<div class="form-group">
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
																			<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
																		</div>
																	</div>
																</div>
															</div>
													</ul>
												</div>
											</div>
										@endforeach
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

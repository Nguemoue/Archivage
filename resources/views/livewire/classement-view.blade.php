<div>
	<h4 class="text-center">Ordre de Classements</h4>
	<div class="border" x-data="">
		<div class="card-body ">
			@if($depth == 1)
				<div class="gap-1 p-1 d-flex px-1 flex-wrap ">
					@foreach($classements as $classement)
						<div class="btn" wire:click='loadSousClassement({{$classement['id']}})'>
							<div>
								<img src="{{asset('icones/folder.png')}}" width="30" alt="">
							</div>
							<h6 class="font-bold">{{$classement['nom']}}</h6>
						</div>
					@endforeach
				</div>
			@elseif($depth == 2)
				<div class="px-2">
					<div class="card-header d-flex flex-wrap justify-content-between p-2">
						<button wire:click="setDepth(1)" class="btn btn-outline-info"><i class="ti ti-arrow-left"></i>
						</button>
						<h6 class="card-title">
							Sous Dossier de <b>{{$currentClassement['nom']}}</b>
						</h6>
					</div>
					<hr>
					<div class="position-relative">
						<div class="row">
							<div class="col col-5">
								@foreach($sousClassements as $sousClassement)
									<div class="d-flex px-1 flex-wrap flex-column m-3" style="cursor: pointer">
										<div wire:click='setSousDepth(true,{{$sousClassement['id']}})' href="#">
											<img src="{{asset('icones/folder.png')}}" width="60" alt="">
										</div>
										<em style="overflow: auto;max-width: 90px"  class="text-wrap overflow-container">{{$sousClassement['nom']}}</em>
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
											<div wire:loading wire:target="setSousDepth(true,{{$sousClassement['id']}})" class="text-danger">
												recuperation du contenu ...
											</div>
											<div wire:loading.remove>
												@forelse($sousDirectories as $key => $dossier)

													<div class="border p-2" style="cursor: pointer">
														<div data-toggle="dropdown" class="dropdown-toggle"
															  id="dropDownMenu{{$key}}">
															<i class="fa fa-folder fa-2x text-warning mx-2"></i>
															<span class="">
                                                    {{$dossier->nom}}
                                                    <b class="text-bold font-bold"> ({{$dossier->documents->count()}}) Fichiers</b>
                                                    </span>
														</div>
														<div class="w-100 dropdown-menu" aria-labelledby="dropdownMenu{{$key}}">
															@foreach($dossier->documents as $doc)
																<li class="my-2 dropdown-item">
																	<i class="fa fa-file"></i>
																	<em>{{$doc->nom}}</em>
																</li>
																<div class="dropdown-divider"></div>
															@endforeach

														</div>
													</div>
												@empty
													<div class="alert alert-warning">Aucun élément !</div>
												@endforelse
											</div>

										</div>
										<hr>
										@if(!$isDownloaded)
											<div class="card-footer">
												<button class="btn btn-sm btn-primary" wire:click="download" wire:confirm="Voulez vous telecharger dans ce dossier ?">
													<i class="ti ti-download"></i> Enregistrer ici
												</button>
											</div>
										@endif

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

</div>

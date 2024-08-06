@extends('templates.templateUser.templateUser')

@section('content')
	<div class="container container-fluid">
		<h4 class="text-center mb-2">Les Dossiers</h4>
		<hr>
		<div class="w-100">
			@if ($tempDossiers->count() > 0)
				<table class="table w-100 table-borderless">
					<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>status</th>
						<th>Cree le</th>
						<th>Fichiers</th>
						<th>Taille (Mo)</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($tempDossiers as $key=>$tempDossier)
						<tr>
							<td><i style="color: rgba(210,210,10,.9)" class="ti ti-folder fs-4"></i></td>
							<td> {{$tempDossier->nom}} </td>
							<td>
								<span class="bage badge-danger rounded p-1"> {{$tempDossier->status}}</span>
							</td>
							<td>{{$tempDossier->created_at->isoFormat("ll")}}</td>
							<td>{{$tempDossier->temp_documents_count}} Fichiers</td>
							<td> {{ round(megaOctet($tempDossier->tempDocuments->sum(fn($item)=>$item->data['size'])) ,2) }} </td>
							<td class="btn-group btn-group-sm">
								<a href="{{route('traitement.dossier.show',[$tempDossier->id])}}" class="btn btn-success">
									traiter
									<i class="ti ti-pencil"></i>
								</a>
								<button role="button" data-bs-toggle="modal" data-bs-target="#dossierModal{{$tempDossier->id}}"
										  class="btn btn-outline-secondary">
									<span class="ti ti-eye"></span>
								</button>
								{{--	modal --}}
								<x-modal-component fullscreen id="dossierModal{{$tempDossier->id}}"
														 title="Liste des document du dossiers">
									@foreach ($tempDossier->tempDocuments as $tempDocument)
										<div class="border mx-2 my-2">
											<div class="d-flex justify-content-between border-2" >
												<div>
													<img
														src="{{ $tempDocument->extension_image }}"
														alt="" class="img-fluid" width="30">
													<span>{{   $tempDocument->data['original_filename']  }}</span>
													@if(session()->has("dossier-{$tempDossier->id}.document-{$tempDocument->id}"))
														<span class="text-danger">(initie)</span>
													@endif
												</div>
												<div>
													<b>Size:</b> {{number_format(megaOctet($tempDocument->data['size']),2)}} MO
												</div>
												<a target="_blank" href="{{ route('file.preview',['id'=>$tempDocument->id]) }}"
													class="btn border btn-sm"
													title="voir de document">open <span class="ti ti-eye"></span></a>
											</div>
										</div>
									@endforeach
								</x-modal-component>
								<a href="#" class="btn btn-danger">
									<i class="ti ti-trash"></i>
								</a>
							</td>
						</tr>
					@endforeach

					</tbody>
				</table>
				<div class="col-12">

				</div>
			@else
				<div class="alert alert-warning">Aucun dossier sacnner</div>
			@endif
		</div>
	</div>
@endsection

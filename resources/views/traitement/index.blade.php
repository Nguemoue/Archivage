@extends('templates.templateUser.templateUser')

@section('content')
	<div class="container container-fluid">
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
						<th>Status</th>
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
								<span class="rounded p-1">{{$tempDossier->status}}</span>
							</td>
							<td>{{$tempDossier->created_at->isoFormat("ll")}}</td>
							<td>{{$tempDossier->temp_documents_count}} Fichiers</td>
							<td>
								<b>{{$tempDossier->tempDocuments->where('status','=',config('traitement.terminer'))->count()}}
									/
									{{$tempDossier->tempDocuments->count()}}</b> Termine(s)
							</td>
							<td> {{ round(megaOctet($tempDossier->tempDocuments->sum(fn($item)=>$item->data['size'])) ,2) }} </td>
							<td class="">
								<a href="{{route('traitement.dossier.show',[$tempDossier->id])}}" class="btn btn-sm btn-outline-dark">
									Traiter
									<i class="ti ti-pencil"></i>
								</a>
								<button role="button" data-bs-toggle="modal" data-bs-target="#dossierModal{{$tempDossier->id}}"
										  class="btn btn-sm btn-outline-dark">
									Naviguer <i class="ti ti-eye"></i>
								</button>
								{{--	modal --}}
								<x-modal-component fullscreen="true" id="dossierModal{{$tempDossier->id}}"
														 title="Liste des document du dossiers">
									<table class="table table-condensed table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Nom</th>
												<th>Status</th>
												<th>Size [en Mega]</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($tempDossier->tempDocuments as $tempDocument)
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>
													<img src="{{ $tempDocument->extension_image}}" alt="" class="img-fluid" width="30">
													<span>{{$tempDocument->data['original_filename']}}</span>
												</td>
												<td>{{ statusTraitement($tempDocument->status) }}</td>
												<td>
													{{number_format(megaOctet($tempDocument->data['size']),2)}}
												</td>
												<td>
													<a target="_blank" href="{{ route('file.preview',['id'=>$tempDocument->id]) }}"
														class="btn btn-sm btn-outline-dark-danger border"
														title="voir de document">Open <span class="ti ti-eye"></span>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</x-modal-component>
								<form method="post" onsubmit="if(confirm('voulez vous poursuivre cette action?')){this.preventDefault()}"
										action="{{route('traitement.dossier.destroy',[$tempDossier->id])}}">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-outline-dark">Delete <i class="ti ti-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach

					</tbody>
				</table>
				<div class="col-12">

				</div>
			@else
				<div class="alert alert-warning"><i class="ti ti-notification"></i> Pas de fichier en attente de traitement!</div>
			@endif
		</div>
	</div>
@endsection

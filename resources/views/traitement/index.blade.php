@extends('template')

@section('content')
	<div class="">
		<h4 class="text-center mb-2">Les Dossiers</h4>
		<hr>
		<div class="w-100">
			@if ($temp_dossiers->count() > 0)
				<table class="table table-borderless">
					<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>status</th>
						<th>Cree le</th>
						<th>Fichiers</th>
						<th>Taille (Mo) </th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($temp_dossiers as $key=>$dossier)
						<tr>
							<td><i class="fa fa-folder fa-2x"></i> </td>
							<td> {{$dossier->nom}} </td>

							<td>
								@if(session()->has("dossier-$dossier->id"))
									<span class="bage badge-danger rounded p-1"> en cours de traitement</span>
								@else
									<span class="badge bg-dark">non initie</span>
								@endif
							</td>
							<td>{{$dossier->created_at->isoFormat("ll")}}</td>
							<td>{{$dossier->temp_documents_count}} Fichiers</td>
							<td> {{round($dossier->size,2)}} </td>
							<td class="btn-group btn-group-sm">
								<a href="{{route('traitement.dossier.show',[$dossier->id])}}" class="btn btn-success">
									traiter
									<i class="fa fa-edit"></i>
								</a>
								<a href="#" data-bs-toggle="modal" data-bs-target="#dossierModal{{$dossier->id}}"
									class="btn btn-outline-secondary">
									<span class="fa fa-eye"></span>
								</a>
								{{--	modal --}}
								<x-modal-component id="dossierModal{{$dossier->id}}" title="Liste des document du dossiers">
									@foreach ($dossier->tempDocuments as $doc)
										@php
											$url = $doc->url;
											// dump($url);
											$part = explode('.', $url);
											$ext = end($part)
										@endphp
										<div class="border mx-2 my-2">
											<div class="d-flex border justify-content-between"
												  style="border:1px solid white">
												<img
													src="{{ asset('icones/' . ($ext == 'pdf' ? 'pdf' : 'img') . '.png') }}"
													alt="" class="img-fluid" width="30">
												<span>{{ '[' . Str::substr($doc->numero, 0, 14) . '...]' }}.{{ $ext }}</span>
												@if(session()->has("dossier-{$dossier->id}.document-{$doc->id}"))
													<span class="text-danger">(initie)</span>
												@endif
												<a href="{{ route('file.preview',['id'=>$doc->id]) }}"
													class="btn border btn-sm"
													title="voir de document"><span class="fa fa-eye"></span></a>

											</div>
										</div>
									@endforeach
								</x-modal-component>
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

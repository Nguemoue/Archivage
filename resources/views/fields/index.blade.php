@extends('templates.templateUser.templateUser')

@section('content')
	<div class="container-fluid">
		<h4 class="text-center">Menu contextuels pour <em>{{ $soustype->nom }}</em></h4>
		<hr>
		<div class=" text-end mb-4">
			<a href="{{ route('soustype.fields.create',['soustype'=>$soustype->id]) }}" class="btn btn-light-info">Ajouter <i class="ti ti-circle-plus"></i></a>
		</div>
		<table class="table  table-bordered">
			<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Type</th>
				<th>Min</th>
				<th>Max</th>
				<th>Defaut</th>
				<th>Preview</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($fields as $item)
				<tr>
					<td>{{ $loop->index + 1 }}</td>
					<td>{{ $item->nom }}</td>
					<td class="text-center">
						@if ($item->nom != "textarea")
							<span class="badge bg-secondary badge-md">
                                        {{ $item->type }}
                                    </span>
						@endif
					</td>
					<td>{{ $item->min??'-' }}</td>
					<td>{{ $item->value??'-' }}</td>
					<td>{{ $item->max??'-' }}</td>
					<td>
						<button data-bs-target="#preview{{$item->id}}" data-bs-toggle="modal" class="btn btn-sm btn-light">Preview <i class="ti ti-eye"></i></button>
						@push('body-end')
							<x-app.modal modal-id="preview{{$item->id}}">
								<x-slot:header><h6>Previsualition du champ {{$loop->index+1}}</h6></x-slot:header>
								<code>
									<x-field :item="$item"/>
								</code>
							</x-app.modal>
						@endpush

					</td>
					<td>
						<div class="btn-group btn-group-sm">
							<a class="btn btn-sm btn-danger text-white">
								<form onclick="submit()"
										action="{{ route('soustype.fields.destroy',['soustype'=>$soustype->id,'field'=>$item->id]) }}"
										method="POST" id="delete">
									@csrf @method('DELETE')
									<span class="text-white">delete</span>
								</form>
							</a>
							<a href="{{ route('soustype.fields.edit',['soustype'=>$soustype->id,'field'=>$item->id]) }}"
								class="btn btn-sm btn-success">Edit</a>
						</div>
					</td>
				</tr>
			@endforeach

			</tbody>
		</table>
	</div>
@endsection

@push('scripts')
	<script src="{{ mix('js/app.js') }}"></script>
@endpush

@push('styles')
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

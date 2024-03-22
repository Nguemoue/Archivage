@extends("templates.templateSuperAdmin.templateSuperAdmin")

@section("content")
	<h5 class="text-center my-3">
		Liste des Structures
	</h5>
	<hr>
	<div class="d-flex justify-content-end mb-2">
		<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#createAdminAccountModal" class="btn btn-sm btn-primary"><i
				class="fa fa-plus-circle"></i> Creer une Nouvelle structure</a>
	</div>
	<div class="card">
		<div class="card-body">
			<table class="table datatable">
				<thead>
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>Description</th>
					<th>Cree Le</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach($structures as $item)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$item->nom}}</td>
						<td>{!!  Str::words($item->description,10)!!}</td>
						<td>{{$item->created_at->IsoFormat("lll")}}</td>
						<td>
							<div class="d-flex">
								<a href="#" data-bs-toggle="modal" class="btn btn-outline-info"
									data-bs-target="#modalEdit{{$item->id}}"><i class="ti ti-pencil"></i></a>
								@includeIf("superAdmin.structures.includes.modalEdit",['item'=>$item])
								<form action="{{route('superAdmin.structure.delete',['structureId'=>$item->id])}}"
										method="post">
									@csrf
									<button type="submit" class="btn btn-outline-danger"><i class="ti ti-trash"></i></button>
								</form>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
	</div>
	<div class="modal fade" role="dialog" id="createAdminAccountModal">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Création d'une nouvelle structure</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<form action="{{route('superAdmin.structure.store')}}" method="post">
					@csrf
					<div class="modal-body">

						<div class="form-group mb-2">
							<label for="nom" class="form-label">Nom</label>
							<input id="nom" type="text" name="nom" class="form-control">
						</div>
						<div class="form-group mb-2">
							<label for="description" class="form-label">Description</label>
							<textarea name="description" id="description" class="form-control summernote"></textarea>
						</div>
					</div>
					<div class="modal-footer justify-content-end">

						<button type="submit" class="btn btn-primary ">
							Creer
							<i class="ti ti-circle"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection


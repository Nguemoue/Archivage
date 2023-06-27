@extends("template_super_admin")

@section("content")
	<h5 class="text-center my-3">
		Liste des Structures
	</h5>
	<hr>
	<div class="d-flex justify-content-end mb-2">
		<a href="#" data-toggle="modal" data-target="#createAdminAccountModal" class="btn btn-sm btn-primary"><i
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
						<td >
							<div class="d-flex">
								<a href="#" data-toggle="modal" class="btn btn-outline-info btn-sm" data-target="#modalEdit{{$item->id}}"><i class="fa fa-pencil"></i></a>
								@includeIf("superAdmin.structures.includes.modalEdit",['item'=>$item])
								<form action="{{route('superAdmin.structure.delete',['structureId'=>$item->id])}}" method="post">
									@csrf
									<button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
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
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Création d'une nouvelle structure</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{route('superAdmin.structure.store')}}" method="post">
					@csrf
					<div class="modal-body">

						<div class="form-group">
							<label for="nom">Nom</label>
							<input id="nom" type="text" name="nom" class="form-control">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" class="form-control sumernote"></textarea>
						</div>
					</div>
					<div class="modal-footer justify-content-around">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
							close
							<i class="fa fa-close"></i>
						</button>
						<button type="submit" class="btn btn-primary btn-sm">
							Creer
							<i class="fa fa-plus-circle"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection


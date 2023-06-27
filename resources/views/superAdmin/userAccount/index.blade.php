@extends("template_super_admin")

@section("content")
	<h5 class="text-center my-3">
		Liste des comptes Utilisateurs
	</h5>
	<hr>
	<div class="d-flex justify-content-end">
		<a href="#" data-toggle="modal" data-target="#createUserAccountModal" class="btn btn-primary"><i
				class="fa fa-plus-circle"></i> Creer un compte</a>
	</div>
	<div class="card">
		<div class="card-body">
			<table class="table datatable">
				<thead>
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>Email</th>
					<th>Structure</th>
					<th>Cree Le</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach($accountList as $item)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->structure?->nom??'-'}}</td>
						<td>{{$item->created_at->IsoFormat("lll")}}</td>
						<td >
							<div class="d-flex">
								<a href="#" data-toggle="modal" class="btn btn-outline-info btn-sm" data-target="#modalEdit{{$item->id}}"><i class="fa fa-pencil"></i></a>
								@includeIf("superAdmin.userAccount.includes.modalEdit",['item'=>$item])
								<form action="{{route('superAdmin.user.account.delete',['userId'=>$item->id])}}" method="post">
									@csrf
									<button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
								</form>
								<a href="#" data-toggle="modal" class="btn btn-outline-info btn-sm" data-target="#modalPermission{{$item->id}}"><i class="fa fa-key"></i></a>
								@includeIf("superAdmin.userAccount.includes.modalPermission",['item'=>$item])

							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
	</div>
	<div class="modal fade" role="dialog" id="createUserAccountModal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Création d'un nouveau compte Utilisateur</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{route('superAdmin.user.account.store')}}" method="post">
					@csrf
					<div class="modal-body">

						<div class="form-group">
							<label for="nom">Nom</label>
							<input id="nom" type="text" name="nom" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="structure" class="control-label">Structure</label>
							<select style="width: 100%;display: block;padding: 4px"  required name="structure_id" id="structure"
									  class="form-control form-select select2">
								@foreach($structures as $structure)
									<option value="{{$structure->id}}">{{$structure->nom}}</option>
								@endforeach
							</select>
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


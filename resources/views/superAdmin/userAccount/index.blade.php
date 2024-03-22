@extends("templates.templateSuperAdmin.templateSuperAdmin")

@section("content")
	<h5 class="text-center my-3">
		Liste des comptes utilisateurs
	</h5>
	<hr>
	<div class="d-flex justify-content-end mb-2">
		<a href="#" data-bs-toggle="modal" data-bs-target="#createUserAccountModal" class="btn btn-primary"><i
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
								<a href="#" data-bs-toggle="modal" class="btn btn-outline-info btn-sm" data-bs-target="#modalEdit{{$item->id}}"><i class="ti ti-pencil"></i></a>
								@includeIf("superAdmin.userAccount.includes.modalEdit",['item'=>$item])
								<form action="{{route('superAdmin.user.account.delete',['userId'=>$item->id])}}" method="post">
									@csrf
									<button type="submit" class="btn btn-sm btn-outline-danger"><i class="ti ti-trash"></i></button>
								</form>
								<a href="#" data-bs-toggle="modal" class="btn btn-outline-info btn-sm" data-bs-target="#modalPermission{{$item->id}}"><i class="ti ti-key"></i></a>
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
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{route('superAdmin.user.account.store')}}" method="post">
					@csrf
					<div class="modal-body">
						<div class="form-group mb-2">
							<label for="nom">Nom</label>
							<input id="nom" type="text" name="nom" class="form-control">
						</div>
						<div class="form-group mb-2">
							<label for="email">Email</label>
							<input id="email" type="email" name="email" class="form-control">
						</div>
						<div class="form-group mb-2">
							<label for="structure" class="control-label">Structure</label>
							<select  required name="structure_id" id="structure"
									  class="form-control form-select select2">
								@foreach($structures as $structure)
									<option value="{{$structure->id}}">{{$structure->nom}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer ">
						<button type="submit" class="btn btn-primary">
							Creer
							<i class="ti ti-plus"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection


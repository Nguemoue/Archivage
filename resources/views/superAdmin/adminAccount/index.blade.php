@extends("templates.templateSuperAdmin.templateSuperAdmin")

@section("content")
	<h5 class="text-center my-3">
		Liste des comptes Administrateurs
	</h5>
	<hr>
	<div class="d-flex justify-content-end">
		<button data-bs-toggle="modal" data-bs-target="#createAdminAccountModal" class="btn btn-primary"><i
				class="ti ti-plus"></i> Creer un compte</button>
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
					<th>Role</th>
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
						<td>{{$item->structure->nom}}</td>
						<td>{{$item->role}}</td>
						<td>{{$item->created_at->IsoFormat("lll")}}</td>
						<td >
							<div class="d-flex">
								<button  data-bs-toggle="modal" class="btn btn-outline-info" data-bs-target="#modalEdit{{$item->id}}"><i class="ti ti-pencil"></i></button>
								@includeIf("superAdmin.adminAccount.includes.modalEdit",['item'=>$item])
								<form action="{{route('superAdmin.admin.account.delete',['adminId'=>$item->id])}}" method="post">
									@csrf
									<button type="submit" class="btn btn-outline-danger"><i class="ti ti-trash"></i></button>
								</form>
								<button href="#" data-bs-toggle="modal" class="btn btn-outline-info" data-bs-target="#modalPermission{{$item->id}}"><i class="ti ti-key"></i></button>
								@includeIf("superAdmin.adminAccount.includes.modalPermission",['item'=>$item])

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
					<h5 class="modal-title">Création d'un nouveau compte administrateur</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{route('superAdmin.admin.account.store')}}" method="post">
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
							<label for="role">role</label>
							<input id="role" type="text" name="role" value="administrateur" class="form-control">
						</div>
						<div class="form-group mb-2">
							<label for="structure" class="control-label">Structure</label>
							<select name="structure_id" id="structure"
									  class="form-select select2-container select2">
								@foreach($structures as $structure)
									<option value="{{$structure->id}}">{{$structure->nom}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer justify-content-end">

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


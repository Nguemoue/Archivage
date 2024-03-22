<div class="modal fade" role="dialog" id="modalEdit{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du compte</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

				</button>
			</div>
			<form action="{{route('superAdmin.admin.account.update',['adminId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					<div class="form-group mb-2">
						<label for="nom" class="form-label">Nom</label>
						<input id="nom" type="text" name="nom" value="{{$item->name}}" class="form-control">
					</div>
					<div class="form-group mb-2">
						<label for="email" class="form-label">Email</label>
						<input id="email" type="email" value="{{$item->email}}" name="email" class="form-control">
					</div>
					<div class="form-group mb-2">
						<label for="email" class="form-label">Role</label>
						<input id="role" type="role" value="{{$item->role}}" name="role" class="form-control">
					</div>
					<div class="form-group">
						<label for="structure" class="control-label">Structure</label>
						<select style="width: 100%;display: block;padding: 4px" name="structure_id" id="structure"
								  class="select2 form-select">
							@foreach($structures as $structure)
								<option {{$item->nom==$structure->nom?'selected':''}} value="{{$structure->id}}">{{$structure->nom}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer justify-content-end">

					<button type="submit" class="btn btn-primary ">
						Mettre a jour
						<i class="ti ti-send"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

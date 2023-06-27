<div class="modal fade" role="dialog" id="modalEdit{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('superAdmin.admin.account.update',['adminId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="nom">Nom</label>
						<input id="nom" type="text" name="nom" value="{{$item->name}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" value="{{$item->email}}" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Role</label>
						<input id="role" type="role" value="{{$item->role}}" name="role" class="form-control">
					</div>
					<div class="form-group">
						<label for="structure" class="control-label">Structure</label>
						<select style="width: 100%;display: block;padding: 4px" name="structure_id" id="structure"
								  class="select2">
							@foreach($structures as $structure)
								<option {{$item->nom==$structure->nom?'selected':''}} value="{{$structure->id}}">{{$structure->nom}}</option>
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
						mettre a jour
						<i class="fa fa-plus-circle"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

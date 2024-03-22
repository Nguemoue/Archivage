<div class="modal fade" role="dialog" id="modalPermission{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Permissions Associé au Compte</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{route('superAdmin.user.permission.update',['userId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					@foreach($permissions as $permission)
						<div class="form-check form-check-inline m-1">
							<input id="permission{{$item->id .'-'. $permission->id}}"
									 {{$item->hasDirectPermission($permission->id)?'checked':''}}
									 type="checkbox" name="permissions[]" value="{{$permission->id}}" class="form-check-input">
							<label for="permission{{$item->id .'-'. $permission->id}}"
									 class="form-check-label">{{$permission->name}}</label>
						</div>
					@endforeach
				</div>
				<div class="modal-footer justify-content-end">
					<button type="submit" class="btn btn-primary">
						Mettre a jour
						<i class="ti ti-upload"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

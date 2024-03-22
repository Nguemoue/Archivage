<div class="modal fade" role="dialog" id="modalPermission{{$item->id}}">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Permissions Associées</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="{{route('superAdmin.admin.permission.update',['adminId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					@foreach($permissions as $permission)
						<div class="form-check m-2 form-check-inline">
							<input id="permission{{$item->id .'-'. $permission->id}}"
									 {{$item->hasDirectPermission($permission->id)?'checked':''}}
									 type="checkbox" name="permissions[]" value="{{$permission->id}}" class="form-check-input">
							<label for="permission{{$item->id .'-'. $permission->id}}" class="form-check-label">{{$permission->name}}</label>
						</div>
					@endforeach
				</div>
				<div class="modal-footer justify-content-end">
					<button type="submit" class="btn btn-primary">
						mettre a jour
						<i class="ti ti-share"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

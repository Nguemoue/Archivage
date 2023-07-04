<div class="modal fade" role="dialog" id="modalPermission{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Permissions Associé au Compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('admin.user.permission.update',['userId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					@foreach($permissions as $permission)
						<div class="form-check form-check-inline m-2 " style="cursor: pointer">
							<input id="permission{{$item->id .'-'. $permission->id}}"
									 {{$item->hasDirectPermission($permission->id)?'checked':''}}
									 type="checkbox" name="permissions[]" value="{{$permission->id}}" class="form-check-input">
							<label for="permission{{$item->id .'-'. $permission->id}}" class="form-check-label">{{$permission->name}}</label>
						</div>
					@endforeach
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

<div class="modal fade" role="dialog" id="modalEdit{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('superAdmin.user.account.update',['userId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="nom{{$item->id}}">Nom</label>
						<input id="nom{{$item->id}}" type="text" name="nom" value="{{$item->name}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email{{$item->id}}">Email</label>
						<input id="email{{$item->id}}" type="email" value="{{$item->email}}" name="email" class="form-control">
					</div>

					<div class="form-group">
						<label for="structure{{$item->id}}" class="control-label">Structure</label>
						<select style="width: 100%;display: block"  name="structure_id" id="structure{{$item->id}}"
								  class="select2 w-100 d-block">
							@foreach($structures as $structure)
								<option {{$structure->id == $item->structure->id?'selected':''}} value="{{$structure->id}}">{{$structure->nom}}</option>
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

<div class="modal fade" role="dialog" id="modalEdit{{$item->id}}">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du compte</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{route('superAdmin.user.account.update',['userId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="account_id" value="{{$item->id}}">
				<div class="modal-body">
					<div class="form-group mb-2">
						<label for="nom{{$item->id}}" class="form-label">Nom</label>
						<input id="nom{{$item->id}}" type="text" name="nom" value="{{$item->name}}" class="form-control">
					</div>
					<div class="form-group mb-2">
						<label for="email{{$item->id}}" class="form-label">Email</label>
						<input id="email{{$item->id}}" type="email" value="{{$item->email}}" name="email" class="form-control">
					</div>

					<div class="form-group mb-2">
						<label for="structure{{$item->id}}" class="form-label">Structure</label>
						<select name="structure_id" id="structure{{$item->id}}"
								  class="select2 form-select ">
							@foreach($structures as $structure)
								<option {{$structure->id == $item->structure->id?'selected':''}} value="{{$structure->id}}">{{$structure->nom}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						mettre a jour
						<i class="ti ti-circle"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" role="dialog" id="modalEdit{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('admin.structure.update',['structureId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="structure_id" value="{{$item->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="nom">Nom</label>
						<input id="nom" type="text" name="nom" value="{{$item->nom}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="description">Role</label>
						<textarea id="description" type="text"  name="description" class="sumernote form-control">{{$item->description}}</textarea>
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

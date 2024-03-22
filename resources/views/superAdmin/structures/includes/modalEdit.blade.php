<div class="modal fade" role="dialog" id="modalEdit{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modification du compte</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{route('superAdmin.structure.update',['structureId'=>$item->id])}}" method="post">
				@csrf
				<input type="hidden" name="structure_id" value="{{$item->id}}">
				<div class="modal-body">
					<div class="form-group mb-2">
						<label for="nom" class="form-label">Nom</label>
						<input id="nom" type="text" name="nom" value="{{$item->nom}}" class="form-control">
					</div>

					<div class="form-group mb-2">
						<label for="description" class="form-label">Role</label>
						<textarea id="description" type="text"  name="description" class="summernote form-control">{{$item->description}}</textarea>
					</div>

				</div>
				<div class="modal-footer">

					<button type="submit" class="btn btn-primary ">
						mettre a jour
						<i class="fa fa-plus-circle"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

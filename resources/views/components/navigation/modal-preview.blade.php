<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-xl" style="min-height: 100vh;min-width: 100vw" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Information sur le fichier <b>{{$document->nom}}</b></h5>
				<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
					<span class="fa fa-close"></span>
				</button>
			</div>
			<div class="modal-body">
				<iframe src="{{route('previewFile.url',[$document->id])}}" height="100%" style="min-height: 100vh;" width="100%"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
			</div>
		</div>
	</div>
</div>

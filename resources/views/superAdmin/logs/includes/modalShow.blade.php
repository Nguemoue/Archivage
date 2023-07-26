<div class="modal fade" role="dialog" id="modalShow{{$item->id}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Donnes supplémentaire</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<table class="table table-bordered">
				@forelse($item->data as $key=>$value)
					<tr>
						<td>{{$key}}</td>
						<td>{{$value}}</td>
					</tr>
				@empty
					<div class="alert alert-info">Aucune données disponible</div>
				@endforelse
			</table>
		</div>
	</div>
</div>

@props(['fullscreen','title'])
@php
$fullscreen =  $fullscreen ??false;
@endphp
<div class="modal fade" id="{{$id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog {{$fullscreen?'modal-fullscreen':'modal-lg'}}">
		<div class="modal-content">
			<div class="modal-header">
				<h4>{{$title}}</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				{{$slot}}
			</div>
		</div>
	</div>
</div>

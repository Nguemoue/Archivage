@props(['modalId',"backdrop","size",'scrollable'])
@php
    $backdrop = $backdrop??false;
    $size = (isset($size) and in_array(strtolower($size),['lg','sm','xs','md']))?strtolower($size):"lg";
	 $scrollable = $scrollable??false;
@endphp
<div
        {{$attributes->merge(['class'=>"modal fade"])}}
        id="{{$modalId}}"
        @if($backdrop) data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" @endif
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div @class(["modal-dialog modal-$size","modal-dialog-scrollable"=>$scrollable])>
        <div class="modal-content">
            <div class="modal-header">
                {{$header}}
					<button type="button" class="btn-close" data-bs-dismiss="modal"
							  aria-label="Close">
					</button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            @isset($footer)
                {{$footer}}
            @endisset
        </div>
    </div>
</div>

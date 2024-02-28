@props(['modalId',"backdrop","size"])
@php
    $backdrop = $backdrop??false;
    $size = (isset($size) and in_array(strtolower($size),['lg','sm','xs','md']))?strtolower($size):"lg";
@endphp
<div
        {{$attributes->merge(['class'=>"modal fade"])}}
        id="{{$modalId}}"
        @if($backdrop) data-bs-backdrop="static" @endif
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-scrollable modal-{{$size}}">
        <div class="modal-content">
            <div class="modal-header">
                {{$header}}
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

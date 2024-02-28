@props(['optional','value','for'])
@php
    $optional = $optional??false;
    $value=$value??'';
    if (isset($slot) and  $slot!=''){
        $value = $slot;
    }
    $for=$for??'';
@endphp
<label for="{{$for}}" {{$attributes->merge([
    'class'=>"form-label"
])}}>
    {{$value}} &nbsp;
    @if(!$optional)
        <span class="text-danger">*</span>
    @endif
</label>

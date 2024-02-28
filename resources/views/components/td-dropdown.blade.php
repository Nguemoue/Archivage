@props(['dropdownId'])
@php
$dropdownId = $dropdownId??uniqid();
@endphp
<div class="dropdown dropstart">
    <a href="#" class="text-muted" id="{{$dropdownId}}"
       data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ti ti-dots-vertical fs-6"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="{{$dropdownId}}">
        {{$slot}}
    </ul>
</div>
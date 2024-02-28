{{-- la fonction openLink est situe dans le fichier custom.js  --}}
@props(['url'])
@php
    $url=$url??"#";
@endphp
<a href="javascript:void(0)" onclick="openLink('{{$url}}')"
   {{$attributes}}>
{{$slot}}
</a>

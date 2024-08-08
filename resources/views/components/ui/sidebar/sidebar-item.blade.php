@props(['url','icon','text','isGroup','groupActive','active'])
@php
    $url = $url??'#';
	 $active=$active??false;
    $text = $text??'';
    $isGroup = $isGroup??false;
    $icon = $icon??($isGroup?'ti ti-user':'ti ti-circle');
    $groupActive = $groupActive??false;


@endphp
<li class="sidebar-item">
    <a @class(["sidebar-link","active"=>$active, "has-arrow"=>$isGroup]) href="{{$url}}" aria-expanded="false">
        <span> <i class="{{$icon}}"></i></span>
        <span class="hide-menu">{{$text}}</span>
    </a>
    @if($isGroup)
        <ul aria-expanded="false" class="collapse first-level">
            {{$groupItem}}
        </ul>
    @endif
</li>


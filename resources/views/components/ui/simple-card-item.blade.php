@props(['text','img','quantity','url','width','height','color'])
@php
    $text = $text??'';
    $img = $img??asset('_materialize_v2/dist/images/svgs/icon-dd-application.svg');
    $quantity=$quantity??0;
    $url=$url??'javascript:void(0)';
    $width=$width??200;
    $height=$height??150;
    $color=$color??'bg-light-primary';
@endphp
<a href="{{$url}}" {{$attributes->merge(["class"=>"p-1 text-center $color card shadow-none rounded-2"])}}>
    <img src="{{$img}}"  width="{{$width}}" height="{{$height}}" class="mb-1 mx-auto"  alt="">
    <p class="fw-semibold text-primary mb-1">{{$text}}</p>
    <h4 class="fw-semibold text-primary mb-0">{{$quantity}}</h4>
</a>

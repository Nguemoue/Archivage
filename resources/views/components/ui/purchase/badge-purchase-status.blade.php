@props(['status'])
@php
    if (!isset($status) or !in_array($status,config('site.purchase_status'))){
        $status = config('site.purchase_status.pending');
    }

    $text = array_flip(config('site.purchase_status'))[$status];

    $mode = match ($status){
        config('site.purchase_status.sent')=>'primary',
        config('site.purchase_status.pending')=>'warning',
        'default'=>'danger',
    };

    $icon = match ($status){
        config('site.purchase_status.sent')=>'ti ti-check',
        'default',config('site.purchase_status.pending')=>'ti ti-x',
    };

@endphp
<span
    class="badge bg-light-{{$mode}} text-{{$mode}} rounded-3 py-2  fw-semibold fs-2 d-inline-flex align-items-center gap-1"><i
        class="{{$icon}} fs-4"></i>{{$text}}</span>

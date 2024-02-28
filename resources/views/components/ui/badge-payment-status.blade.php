@props(['status'])
@php
    if ($status == null){
        $status = config("site.payment_status.not_start");
    }
    if ($status and !in_array($status,config('site.payment_status'))){
        $status = config('site.payment_status.remaining');
    }

    $paymentsText=[config("site.payment_status.not_start")=>"Not Started",config("site.payment_status.remaining")=>"Remaining",config("site.payment_status.finish")=>"Paid"];
    $text = $paymentsText[$status];

    $mode = match ($status){
        config('site.payment_status.finish')=>'primary',
        config('site.payment_status.remaining')=>'warning',
        config('site.payment_status.not_start'),'default'=>'danger',
    };

    $icon = match ($status){
        config('site.payment_status.finish'),config('site.payment_status.remaining')=>'ti ti-check',
        'default',config('site.payment_status.not_start')=>'ti ti-x',
    };

@endphp
<span
    class="badge bg-light-{{$mode}} text-{{$mode}} rounded-3 py-2  fw-semibold fs-2 d-inline-flex align-items-center gap-1"><i
        class="{{$icon}} fs-4"></i>{{$text}}</span>

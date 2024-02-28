@props(['purchase'])
@php
    $maxValue = 100;
    $minValue=0;
    $currentValue = 0;

    if ($purchase instanceof  \App\Models\PurchaseOrder){
    }

    $nbMonth = match ($purchase->supplier->payment_terms){
        config('site.payment_terms.Net 60 days payment terms')=>2,
        config('site.payment_terms.Net 90 days payment terms')=>3,
        config('site.payment_terms.Net 30 days payment terms')=>1,
        config('site.payment_terms.Cash on delivery (COD)')=>0
    };
    if ($nbMonth==0){
        $currentValue = 100;
    }else{
        $startDate = $purchase->created_at;
        $endDate = $startDate->copy()->addMonths($nbMonth);

        // Calculate the total number of seconds between the past date and the future date
        $totalTime = $endDate->diffInSeconds($startDate);

        // Calculate the number of seconds that have passed from the past date until now
        $passedTime = now()->diffInSeconds($startDate);

        // Calculate the percentage of time that has passed
        $percentage = ($passedTime / $totalTime) * 100;
        if ($percentage>100){
            $percentage = 100;
        }
        $currentValue = round($percentage,2);
    }
@endphp
<div class="d-flex align-items-center gap-3">
    <div class="progress bg-light w-100" style="height: 4px;">
        <div class="progress-bar" role="progressbar" aria-label="Progress for {{$purchase->code}}" style="width: {{$currentValue}}%;" aria-valuenow="{{$currentValue}}" aria-valuemin="{{$minValue}}" aria-valuemax="{{$maxValue}}"></div>
    </div>
    <span class="fw-normal">{{$currentValue}}%</span>
</div>

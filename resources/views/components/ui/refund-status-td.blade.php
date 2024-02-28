@props(['status'])
<div>
    @if($status == 0)
        <span class="badge rounded bg-secondary badge-secondary"> <i class="ti ti-refresh-off"></i> Pending </span>
    @else
        <span class="badge rounded badge-success bg-success"><i class="ti ti-check"></i> Approved </span>
    @endif
</div>

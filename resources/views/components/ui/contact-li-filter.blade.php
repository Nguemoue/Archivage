@props(['filter'])
<li class="list-group-item border-0 p-0 mx-9">
    <a class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="{{route('admin.user.index',['filter'=>$filter])}}">
        <i class="ti ti-star"></i>{{$filter}} </a>
</li>

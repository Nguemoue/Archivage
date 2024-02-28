@props(['role'])
@php
    $roleCode = $role?$role->code:config('site.user_default_role');
@endphp
<li class="list-group-item border-0 p-0 mx-9 {{request()->query('filter')==$roleCode?'active':''}}">
    <a class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="{{route('admin.user.index',['role'=>$roleCode])}}">
        <i class="ti ti-bookmark fs-5 text-primary"></i>{{$role->name}} </a>
</li>

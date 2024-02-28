@props(["user","active"])
@php
    $user = $user ?? (new stdClass);
    $active = $active ?? false;
@endphp
<div class="chat-list chat {{$active?'active-chat':''}}" data-user-id="{{$user->id}}">
    <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            @if ($user->gender === 'male')
                <img src="{{asset('_materialize_v2/dist/images/profile/user-1.jpg')}}" alt="user1" width="72"
                     height="72" class="rounded-circle">
            @elseif ($user->gender === 'female')
                <img src="{{asset('_materialize_v2/dist/images/profile/user-2.jpg')}}" alt="user2" width="72"
                     height="72" class="rounded-circle">
            @endif
            {{-- <img src="{{asset('_materialize_v2/dist/images/profile/user-1.jpg')}}" alt="user4" width="72" height="72" class="rounded-circle" /> --}}
            <div>
                <h6 class="fw-semibold fs-4 mb-0">{{$user->fullname}} </h6>
                <p class="mb-0">{{$user->role->name}}</p>
                <p class="mb-0">{{config('site.entreprise.name')}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 mb-7">
            <p class="mb-1 fs-2">Phone number</p>
            <h6 class="fw-semibold mb-0">{{$user->custom_phone_number}}</h6>
        </div>
        <div class="col-8 mb-7">
            <p class="mb-1 fs-2">Email address</p>
            <h6 class="fw-semibold mb-0">{{$user->email}}</h6>
        </div>
        <div class="col-12 mb-9">
            <p class="mb-1 fs-2">Address</p>
            <h6 class="fw-semibold mb-0">{{$user->address}}</h6>
        </div>
        <div class="col-4 mb-7">
            <p class="mb-1 fs-2">City</p>
            <h6 class="fw-semibold mb-0">{{$user->city}}</h6>
        </div>
        <div class="col-8 mb-7">
            <p class="mb-1 fs-2">Country</p>
            <h6 class="fw-semibold mb-0">{{$user->country}}</h6>
        </div>
    </div>
    <div class="border-bottom pb-7 mb-4">
        <p class="mb-2 fs-2">Notes</p>
        <p class="mb-3 text-dark">
            {{$user->bio}}
        </p>
    </div>
    {{--<div class="d-flex align-items-center gap-2">
        <a href="{{route('admin.roles.edit',[$user])}}" class="btn btn-primary fs-2">Edit</a>
--}}
    @if(in_array(authRole()->code,['R00','R005']))


    <div>
        @if(!$user->is_active)
            <form action="{{route('admin.user.destroy',[$user->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger fs-2">Delete</button>
            </form>
        @endif

    </div>
    @endif
</div>

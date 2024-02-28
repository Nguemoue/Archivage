@props(["user"])
{{-- @php
    $user = $user??optional();
    $image = imageFromGender($user->gender);
@endphp --}}
<li>
    <a href="#"
       class="px-4 py-3 bg-hover-light-black d-flex align-items-center chat-user"
       id="chat_user_{{$user->id}}"
       data-user-id="{{$user->id}}" data-user-star="{{(bool) $user->is_starred}}" data-user-active="{{(bool) $user->is_active}}">
        <span class="position-relative">
            @if ($user->gender === 'male')
                <img src="{{asset('_materialize_v2/dist/images/profile/user-1.jpg')}}" alt="user1" width="40" height="40" class="rounded-circle">
            @elseif ($user->gender === 'female')
                <img src="{{asset('_materialize_v2/dist/images/profile/user-2.jpg')}}" alt="user2" width="40" height="40" class="rounded-circle">
            @endif
            {{-- <img src="{{$image}}" alt="user1" width="40" height="40" class="rounded-circle"> --}}
        </span>
        <div class="ms-6 d-inline-block w-75">
            <h6 class="mb-1 fw-semibold chat-title" data-username="{{$user->fullname}}">{{$user->fullname}}</h6>
            <span class="fs-2 text-body-color d-block">{{$user->email}}</span>
        </div>
    </a>
</li>

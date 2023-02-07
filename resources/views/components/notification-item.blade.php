<li class="waves-effect waves-light">
	<div class="media">
		<x-slot name="image"/>
		<img class="d-flex align-self-center img-radius" src="{{ asset('logo-admin.jpg') }}"
			  alt="Generic placeholder image">
		<div class="media-body">
			<h5 class="notification-user">{{$user}}</h5>
			<p class="notification-msg">{{$msg}}</p>
			<span class="notification-time">{{$date}}</span>
		</div>
	</div>
</li>

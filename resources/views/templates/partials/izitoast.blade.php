<script>
	@if($errors->any())
	iziToast.error({
		message: `<ul>
            @foreach($errors->all() as $error)
		<li>{{$error}}</li>
            @endforeach</ul>`,
		toast: true,
		timeout: {{config('setup.toast_timeout')}},
		position: "{{config('setup.toast_position')}}"
	});
	@endif

	@if(session()->has('success'))
	iziToast.success({
		message: `<li>{{session()->get('success')}}</li>`,
		toast: true,
		timeout: {{config('setup.toast_timeout')}},
		position: "{{config('setup.toast_position')}}"
	});
	@endif

	@if(session()->has('status'))
	iziToast.success({
		message: `<li>{{session('status')}}</li>`,
		toast: true,
		timeout: {{config('setup.toast_timeout')}},
		position: "{{config('setup.toast_position')}}"
	});
	@endif

	@if(session()->has('warning'))
	iziToast.warning({
		message: `<li>{{session()->get('warning')}}</li>`,
		toast: true,
		timeout: {{config('setup.toast_timeout')}},
		position: "{{config('setup.toast_position')}}"
	});

	@endif

	@if(session()->has(ReturnStatus::INFO))
	iziToast.info({
		message: `<li>{{session()->get(ReturnStatus::INFO)}}</li>`,
		toast: true,
		timeout: {{config('setup.toast_timeout')}},
		position: "{{config('setup.toast_position')}}"
	});
	@endif
</script>

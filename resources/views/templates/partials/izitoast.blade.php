<script>
    @if($errors->any())
    iziToast.error({
        message: `<ul>
            @foreach($errors->all() as $error)
        <li>{{$error}}</li>
            @endforeach</ul>`,
        toast: true,
        timeout: {{config('misc.izitoast_delay')}},
        position: "{{config('misc.izitoast_position')}}"
    });
    @endif

    @if(session()->has(ReturnStatus::SUCCESS))
    iziToast.success({
        message: `<li>{{session()->get(ReturnStatus::SUCCESS)}}</li>`,
        toast: true,
        timeout: {{config('misc.izitoast_delay')}},
        position: "{{config('misc.izitoast_position')}}"
    });
    @endif

    @if(session()->has('status'))
    iziToast.success({
        message: `<li>{{session('status')}}</li>`,
        toast: true,
        timeout: {{config('misc.izitoast_delay')}},
        position: "{{config('misc.izitoast_position')}}"
    });
    @endif

    @if(session()->has(ReturnStatus::WARNING))
    iziToast.warning({
        message: `<li>{{session()->get(ReturnStatus::WARNING)}}</li>`,
        toast: true,
        timeout: {{config('misc.izitoast_delay')}},
        position: "{{config('misc.izitoast_position')}}"
    });

    @endif

    @if(session()->has(ReturnStatus::INFO))
    iziToast.info({
        message: `<li>{{session()->get(ReturnStatus::INFO)}}</li>`,
        toast: true,
        timeout: {{config('misc.izitoast_delay')}},
        position: "{{config('misc.izitoast_position')}}"
    });
    @endif
</script>

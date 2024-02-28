<script src="{{asset('_materialize_v2/dist/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('_materialize_v2/dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
<script src="{{asset('_materialize_v2/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

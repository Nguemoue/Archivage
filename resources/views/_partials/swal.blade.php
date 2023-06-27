@if(session()->has('success'))
	Swal.fire({
	position:"top-end",
	toast:true,
	timer: 3000,
	showCancelButton:false,
	showConfirmButton:false,
	showCloseButton:false,
	icon:"success",
	titleText:`{{session()->get('success')}}`
	})

@endif


@if(session()->has('danger'))
	Swal.fire({
	position:"top-end",
	toast:true,
	showCancelButton:false,
	showConfirmButton:false,
	showCloseButton:true,
	icon:"error",
	titleText:`{{session()->get('danger')}}`
	})

@endif


@if(session()->has('warning'))

	Swal.fire({
	position:"top-end",
	toast:true,
	timer: 3000,
	timerProgressBar: true,
	showCancelButton:false,
	showConfirmButton:false,
	showCloseButton:true,
	icon:"warning",
	titleText:`{{session()->get('warning')}}`
	})

@endif


@if(session()->has('info'))

	Swal.fire({
	position:"top-end",
	toast:true,
	timer: 3000,
	showCancelButton:false,
	showConfirmButton:false,
	showCloseButton:true,
	icon:"info",
	titleText:`{{session()->get('info')}}`
	})

@endif

@if($errors->any())

	Swal.fire({
	position:"top-end",
	toast:true,
	timer: 3000,
	showCancelButton:false,
	showConfirmButton:false,
	showCloseButton:true,
	icon:"danger",
	title:`<ul>
		@foreach($errors->all() as $item)
			<li>{{$item}}</li>
		@endforeach
	</ul>`
	})

@endif

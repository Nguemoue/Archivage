<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Reinitialisation du mot de passe</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<meta name="keywords" content="archivage"/>
	<meta name="author" content="developper"/>
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome-n.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	@stack("styles")

</head>

<body>
<div id="pcoded" class="pcoded">
	<div class="pcoded-container navbar-wrapper">
		<div class="pcoded-main-container">
			<div class="pcoded-wrapper mx-auto">
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							<div>{{$error}}</div>
						@endforeach
					</div>
				@endif
				@yield("content")
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{asset("assets/js/bootstrap/js/bootstrap.min.js")}}"></script>
@livewireScripts
@stack("scripts")
</body>

</html>

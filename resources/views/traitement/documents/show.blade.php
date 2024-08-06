@extends("templates.templateUser.templateUser")

@section("title")
	Edition
@endsection

@section("content")
	@routes('traitement.document.*')
	<livewire:traitement.traitement-document  :temp-document="$tempDocument"/>

@endsection

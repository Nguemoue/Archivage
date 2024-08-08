@props(['name'])
<div  {{$attributes->merge(['class'=>"d-flex px-2 flex-column m-3 cursor-pointer"])}}>
	<a>
		<span class="ti ti-folder navigation-folder text-warning"></span>
	</a>
	<h6 class="font-bold text-wrap">{{$name}}</h6>
</div>

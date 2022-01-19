@extends('layouts.app')

@section('content')
<h3>INICIO</h3>
<!-- Despliegue de favoritos publicos -->
<div>
	@foreach($favorites as $favorite)
	<div class="favorite-post">
		<div>
			<h4>{{$favorite->title}}</h4>
			<a target="_blank" href="{{$favorite->url}}">{{$favorite->url}}</a>
		</div>
	</div>
	@endforeach
</div>
<br>

{{$favorites->links('vendor.pagination.tailwind')}}

@endsection

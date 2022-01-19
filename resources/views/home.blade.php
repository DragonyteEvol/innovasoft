@extends('layouts.app')

@section('content')

<a href="{{route('createFavorite')}}"><button class="btn">Crear Favorito<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg></button></a>
<a href="{{route('createCategorie')}}"><button class="btn">Crear Categoria<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z"></path><circle cx="8.353" cy="8.353" r="1.647"></circle></svg></button></a>

<h3>TUS FAVORITOS</h3>

<div>
	@foreach($favorites as $favorite)
	<div class="favorite-post">
		<a href="{{route('alterFavorite',$favorite->id)}}">
			<div>
				<h4>{{$favorite->title}}</h4>
				<a target="_blank" class="url" href="{{$favorite->url}}">{{$favorite->url}}</a>
			</div>
		</a>
	</div>
	@endforeach
</div>
<br>
{{$favorites->links('vendor.pagination.tailwind')}}

@endsection

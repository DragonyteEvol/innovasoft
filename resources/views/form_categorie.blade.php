@extends('layouts.app')

@section('content')

<h3>CREAR CATEGORIA Y VER CATEGORIAS</h3>

<form method="POST" action="{{route('insertCategorie')}}">
	{{csrf_field()}}
	<label>Categoria</label>
	<input type="text" name="categorie">
	<input type="submit" class="btn">
</form>
<br>
@foreach($categories as $categorie)
<a href="{{route('alterCategorie',$categorie->id)}}"><button class="tag">{{$categorie->categorie}}<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path></svg></button></a>
@endforeach
@endsection

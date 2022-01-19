@extends('layouts.app')

@section('content')

<h3>EDITAR CATEGORIA</h3>

<form method="POST" action="{{route('editCategorie',$data['id'])}}">
	@method('PUT')
	{{csrf_field()}}
	<label>Categoria</label>
	<input type="text" name="categorie" value="{{$data['categorie']}}">
	<input type="submit" class="btn" value="Enviar">
</form>

<form method="POST" action="{{route('dropCategorie',$data['id'])}}">
	@method('DELETE')
	{{csrf_field()}}
	<input type="submit" class="btn" value="Borrar">
</form>
@endsection

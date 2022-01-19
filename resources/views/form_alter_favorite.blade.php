@extends('layouts.app')

@section('content')

<h3>EDITAR FAVORITO</h3>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<form method="POST" action="{{route('editFavorite',$data['id'])}}">
	@method('PUT')
	{{csrf_field()}}
	<label>Titulo</label>
	<input type="text" name="title" value="{{$data['title']}}"><br>
	<label>URL</label>
	<input type="text" name="url" value="{{$data['url']}}"><br>
	<label>Descripcion</label>
	<input type="text" name="description" value="{{$data['description']}}"><br>
	<label>Visibilidad</label>
	@if($data->visibility==0)
	<input type="checkbox" name="visibility"><br>
	@else
	<input type="checkbox" name="visibility" checked><br>
	@endif

	<label>Categorias</label>
	<select>
		<option></option>
		@foreach($categories as $categorie)
		<option type="submit" onclick="alterCategorie({{$categorie->id}},'{{$categorie->categorie}}')" value="{{$categorie->id}}">{{$categorie->categorie}}</option>
		@endforeach
	</select><br>
	<input type="text" hidden name="id_categorie" value="{{$id_categorie}}" id="id_categorie" >

	<div id="name-categories">
	@foreach($related_categories as $categorie)
		<button title="Borrar" class="tag" onclick="dropCategorie({{$categorie->id}})">{{$categorie->categorie}}</button>
	@endforeach
</div>
	<br>
	<input type="submit" value="Enviar">
</form>

<form method="POST" action="{{route('dropFavorite',$data['id'])}}">
	@method('DELETE')
	{{csrf_field()}}
	<input type="submit" value="Borrar">
</form>
@endsection

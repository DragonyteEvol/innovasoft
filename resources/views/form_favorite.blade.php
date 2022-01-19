@extends('layouts.app')

@section('content')

<h3>CREAR FAVORITO</h3>

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
<form method="POST" action="{{route('insertFavorite')}}">
	{{csrf_field()}}
	<label>Titulo</label>
	<input type="text" name="title"><br>
	<label>URL</label>
	<input required type="text" name="url"><br>
	<label>Descripcion</label>
	<input type="text" name="description"><br>
	<label>Categorias</label>
	<select class="tag">
		<option></option>
		@foreach($categories as $categorie)
		<option onclick="alterCategorie({{$categorie->id}},'{{$categorie->categorie}}')" value="{{$categorie->id}}">{{$categorie->categorie}}</option>
		@endforeach
	</select><br>
	<div id="name-categories"></div>
	<input type="text" name="id_categorie" id="id_categorie" hidden>
	<label>Visibilidad</label>
	<input type="checkbox" name="visibility"><br>
	<input type="submit" class="btn">
</form>
@endsection

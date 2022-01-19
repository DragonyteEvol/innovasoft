<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>
	<!-- Validacion de autenticacion -->
	@if (Route::has('login'))
	<nav>
		@auth
		<div>
		<a href="#" class="user-name">
			{{ Auth::user()->name }}
		</a>

			<a href="{{ route('logout') }}"
			   onclick="event.preventDefault();
			   document.getElementById('logout-form').submit();">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z"></path><path d="M11 2h2v10h-2z"></path></svg>
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST">
				@csrf
			</form>
		</div>
		<ul class="menu-items" id="menu-mode">
			<li><a href="{{ url('/home') }}">TUS FAVORITOS</a></li>
			<li><a href="{{ url('/') }}">INICIO</a></li>
		</ul>
		<span class="btn-menu" onclick="showResposiveMenu()">
			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
		</span>
		@else
		<a href="{{ route('login') }}">Iniciar Sesion</a>

		@if (Route::has('register'))
		<a href="{{ route('register') }}">Registrarse</a>
		@endif

		@endauth
	</nav>
	@endif
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	<main>
		@yield('content')
	</main>
</body>
</html>

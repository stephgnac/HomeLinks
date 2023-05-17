<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">

	@yield('style')
	<title>	@yield('title') | HomeLinks</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<header>
		<h1>HomeLinks</h1>
		<nav>
			<ul>
				<li><a href="/">Accueil</a></li>
				@if(session()->has('email'))
					<li><a href="deconnecte">Déconnexion</a></li>
				@else
					<li><a href="login">Se connecter</a></li>
					<li><a href="register">S'inscrire</a></li>
				@endif
				
			</ul>
		</nav>
	</header>
	@yield('content')
</body>
</html>

@extends("layout.base")
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection
@section('title')
	HomeLinks - Connexion
@endsection
@section('content')
    <main>
		<section>
			<h2>Se connecter</h2>
			<form method="POST" action="Connexion/Verification">
			@csrf
				<label for="email">Adresse email :</label>
				<input type="email" id="email" name="email" required>
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="password" required> <br><br>
				@error('password')
				<h6 style="text-align:center; color: red;">{{ $message }}</h6>
				@enderror
				@if(session()->has('message'))
				<h6 style="text-align:center; color: red;">{{ session()->get('message') }}</h6>
				@endif
				<input type="submit" value="Se connecter">
			</form>
        </section>
    </main>
@endsection
@extends("layout.base")
@section('style')
    
@endsection
@section('title')
	HomeLinks - Inscription
@endsection
@section('content')
    <main>
		<section>
			<h2>S'inscrire</h2>
			<form method="post" action="Creation/Compte">
			@csrf
				<label for="name">Nom complet :</label>
				<input type="text" id="name" name="name" placeholder="Ex:Stéphane GNCADJA"required>
				<label for="email">Adresse email :</label>
				<input type="email" id="email" placeholder="Votre mail"name="email" required>
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="password" placeholder="Mot de de passe"required>
				<label for="confirm_password">Confirmer le mot de passe :</label>
				<input type="password" id="confirm_password" placeholder="Entrez à nouveau le mot de passe" name="password_confirmation" required><br> <br>
				@error('password')
                    <h6 style="text-align:center; color: red;">{{ $message }}</h6>
                @enderror
                @error('name')
                    <h6 style="text-align:center; color: red;">{{ $message }}</h6>
                @enderror
                @error('email')
                    <h6 style="text-align:center; color: red;">{{ $message }}</h6>
                @enderror
                @error('confirm_password')
                    <h6 style="text-align:center; color: red;">{{ $message }}</h6>
                @enderror
				<input type="submit" value="S'inscrire">
			</form>
		</section>
	</main>
@endsection
@extends("layout.base")
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/add.css') }}">
@endsection
@section('title')
    Ajouter-Equipement 
@endsection
@section('content')
    <div class="container">
        @if(isset($devices) && count($devices) > 0)
            <h1>Mes équipements</h1>
            <form method='post' action='Myequipement'>
            @csrf
                <table>
                    <tr>
                        <th>Numero</th>
                        <th>Nom</th>
                        <th>Type</th>
                    </tr>
                    @foreach($devices as $device)

                        <tr>
                        <td>{{$device->SerieNumber}}</td>
                        <td>{{$device->name}}</td>
                        <td>{{$device->type}}</td>
                        <td>
                            <input type='hidden' name='id' value='{{$device->id}}'>
                            @if($device->state != 0)
                                <input type='submit' name='action' value='Éteindre'>
                            @else
                                <input type='submit' name='action' value='Allumer'>
                            @endif
                            <input type='submit' name='action' value='Supprimer'>

                        </td>
                    @endforeach
                </table>
            </form>

        @endif
        <br><br>
        <h2>Ajouter un équipement</h2>
        <form method="post" action="ajout">
        @csrf
            <input type="text" name="nom" id="nom" placeholder="Nom de l'équipement" required>
            <input type="text" name="type" id="nom" placeholder="Type de l'équipement" required>
            <input type="number" name="number" id="nom" placeholder="Numéro de Série" required>
            <input type="submit" value="Ajouter"><br>
            @error('nom')
				<h6 style="text-align:center; color: red;">{{ $message }}</h6>
			@enderror
            @error('type')
				<h6 style="text-align:center; color: red;">{{ $message }}</h6>
			@enderror
            @error('number')
				<h6 style="text-align:center; color: red;">{{ $message }}</h6>
			@enderror
			
        </form>
    </div>
@endsection
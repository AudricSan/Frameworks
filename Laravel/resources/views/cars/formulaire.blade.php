@extends('layouts.form')
@section('content')
    <form method="POST" action="/cars/insert" style="position:relative; left:25%; width:100%">
    @csrf
        <fieldset style="max-width: 980px; text-align:center">
        <legend><h1 style="font-style:oblique; font-size:2em;"> Encodage d'une nouvelle voiture </h1></legend>
            </br>
            <label for="serie" style="font-weight: bold; font-size:1.5em;"> Numéro de série (111-AAA-1) :</label></br>
            <input type="text" id="serie" name="serial" style="font-size:1.5em;"></br>
            </br>
            <label for="couleur" style="font-weight: bold; font-size:1.5em;"> Couleur :</label></br>
            <input type="text" id="couleur" name="color" style="font-size:1.5em;"></br>
            </br>
            <label for="puissance" style="font-weight: bold; font-size:1.5em;"> Puissance :</label></br>
            <input type="text" id="puissance" name="power" style="font-size:1.5em;"></br>
            </br>
            <button type="submit" style="font-size:1.5em;"> Créer </button></br>
        </fieldset>
    </form>
@endsection


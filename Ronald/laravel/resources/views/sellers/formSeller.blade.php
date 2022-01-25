@extends('layouts.formSeller')
@section('content')
    <form method="POST" action=" /sellers/insert "style="position:relative; left:25%; width:100%">
    @csrf
        <fieldset style="max-width: 980px; text-align:center">
        <legend><h1 style="font-style:oblique; font-size:2em;"> Encodage d'un(e) nouveau(elle) vendeur(euse) </h1></legend>
            </br>
            <label for="nom" style="font-weight: bold; font-size:1.5em;"> Nom :</label></br>
            <input type="text" id="serie" name="name" style="font-size:1.5em;"></br>
            </br>
            <label for="prenom" style="font-weight: bold; font-size:1.5em;"> Prénom :</label></br>
            <input type="text" id="prenom" name="firstname" style="font-size:1.5em;"></br>
            </br>
            <label for="age" style="font-weight: bold; font-size:1.5em;"> Age :</label></br>
            <input type="text" id="age" name="age" style="font-size:1.5em;"></br>
            </br>
            <button type="submit" style="font-size:1.5em;"> Créer </button></br>
        </fieldset>
    </form>
@endsection
@extends('layout')
@section('content')
    @isset($car)
        <hgroup>
            <h6>Numéro de série</h6> 
            <h2>{{ $car->serial }}</h2>
        </hgroup>
        <hgroup>
            <h6>Puissance</h6> 
            <h2>{{ $car->power }}</h2>
        </hgroup>
        <hgroup>
            <h6>Couleur</h6> 
            <h2>{{ $car->color->name }}</h2>
        </hgroup>
        
    @endisset
@endsection
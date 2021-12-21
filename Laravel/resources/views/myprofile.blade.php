@extends('layout.profile')

@section('content')
    <h1> Coucou {{$users[0]['name']}} </h1>
    <h2> Voici t'es donnée </h2>
    <p>
        This is your age {{ $users[0]['age'] }}
    </p>
@endsection
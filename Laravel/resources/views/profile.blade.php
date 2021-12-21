@extends('layout.profile')

@section('content')
    <p>
        @foreach ($users as $user)
        <h1> Coucou {{$user['name']}} </h1>
        <h2> Voici t'es donnée </h2>
            This is your age {{ $user['age'] }}
        @endforeach
    </p>
@endsection
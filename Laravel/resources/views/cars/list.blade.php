@extends('layout.profile')

@section('content')
    <p>
        @foreach ($cars as $car)
        <h1> {{$car['Car_Serial']}} </h1>
        <h1> {{$car['Car_Color']}} </h1>
        <h1> {{$car['Car_Power']}} </h1>
        @endforeach
    </p>
    </p>
@endsection
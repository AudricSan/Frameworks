@extends('layouts.list')
@section('content')

    <p>
    @isset($cars)
    @foreach ($cars as $car)
        <body style="width :100%">
            <!-- <h2>{{ $car }}</h2> -->
            <table style="text-align: left; padding-left:42%;">
            <tr>
                <th style="border: 1px solid black; padding:15px 15px 0 15px"> <h3> Numéro de série : </h3> </th>
                <th style="border: 1px solid black;text-align: center; padding:15px 15px 0 15px"> <h3> {{ $car->serial }} </h3> </th>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding:15px 15px 0 15px"> <h3> Puissance : </h3> </th>
                <th style="border: 1px solid black;text-align: center; padding:15px 15px 0 15px"> <h3> {{ $car->power }} </h3> </th>
            </tr> 
                <th style="border: 1px solid black; padding:15px 15px 0 15px"> <h3> Couleur :</h3> </th>
                <th style="border: 1px solid black;text-align: center; padding:15px 15px 0 15px"> <h3> {{ $car->color }} </h3> </th>
            </tr>
            <tr style="color:orangered">
                <th scope="row" colspan="2" style="text-align: center; padding:15px 15px 0 15px"> </br> </th>
            </tr>
            </table>
        </body>
    @endforeach
    @endisset
    </p>

@endsection
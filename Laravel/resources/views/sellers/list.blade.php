@extends('layouts.listSeller')
@section('content')

    <p>
    @isset($sellers)
    @foreach ($sellers as $seller)
        <body style="width :100%">
            <!-- <h2>{{ $seller }}</h2> -->
            <table style="text-align: left; padding-left:42%;">
            <tr>
                <th style="border: 1px solid black; padding:15px 15px 0 15px"> <h3> Nom : </h3> </th>
                <th style="border: 1px solid black;text-align: center; padding:15px 15px 0 15px"> <h3> {{ $seller->nom }} </h3> </th>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding:15px 15px 0 15px"> <h3> Prénom : </h3> </th>
                <th style="border: 1px solid black;text-align: center; padding:15px 15px 0 15px"> <h3> {{ $seller->prenom }} </h3> </th>
            </tr> 
                <th style="border: 1px solid black; padding:15px 15px 0 15px"> <h3> Age :</h3> </th>
                <th style="border: 1px solid black;text-align: center; padding:15px 15px 0 15px"> <h3> {{ $seller->age }} </h3> </th>
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
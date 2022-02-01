@extends('layout')

@section('content')
   

    @isset($color)
        <form action="/colors/{{ $color->id }}" method="post">
        @method('put')
    @endisset
    @empty($color)
        <form action="/colors" method="post">
    @endempty
        @csrf
        <input type="text" name="name" placeholder="Nom de la couleur" value="{{ $color->name ?? "" }}">
        <input type="text" name="hex" placeholder="Code hexadecimal" value="{{ $color->hex ?? ""}}">
        @isset($cars)
            <select name="cars[]" id="" multiple>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->serial }}</option>
                @endforeach
            </select>
        @endisset
        <input type="submit" value="SAUVEGARDER">
    </form>

@endsection

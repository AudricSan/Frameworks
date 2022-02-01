@extends('layout')

@section('content')
    @if(isset($car))
        <form action="/cars/{{$car->id}}" method="post">
        @method('put')
    @else
        <form action="/cars" method="post">
    @endif
        @csrf
        <input type="text" name="serial" placeholder="serial" value="{{ $car->serial ?? "" }}">
        <input type="text" name="power" placeholder="power" value="{{ $car->power ?? "" }}">
        @isset($colors)
            <select name="color_id" id="">
                @foreach($colors as $color)
                    @if (isset($car) && $car->color->id == $color->id)
                        <option value="{{ $color->id }}" selected>{{ $color->name }}</option>
                    @else
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endif
                @endforeach
            </select>
        @endisset
        <br>
        <input type="submit">
    </form>
@endsection
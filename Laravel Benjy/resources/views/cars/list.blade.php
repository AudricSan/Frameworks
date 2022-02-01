@extends('layout')
@section('content')
   <h1>CARS</h1>
    @isset($cars)
       <ul>
            @foreach($cars as $car)
            <li>
                <a href="/cars/{{ $car->id }}">{{ $car->serial }} ({{ $car->power }})</a> <span class="color-preview" style="background-color: {{ $car->color->hex ?? ""}}"></span>
                <a class="button" href="/cars/{{ $car-> id }}/edit">EDIT</a>
                <form action="/cars/{{ $car->id }}" method="post" style="display: inline">
                    @csrf
                    @method('delete')
                    <input type="submit" value="DELETE">
                </form>
            </li>
            @endforeach
            <li><a class="button" href="/cars/create">CREATE NEW</a></li>
       </ul>
    @endisset
    @empty($cars)
        <a href="/cars/create" class="button">CREATE NEW</a>
    @endempty
@endsection
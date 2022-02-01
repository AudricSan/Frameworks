@extends('layout')
@section('content')
   <h1>COLORS</h1>
    @isset($colors)
        <ul>
        @foreach($colors as $color)
            <li>
            <a href="/colors/{{ $color->id }}">{{ $color->name }} ({{ $color->hex }})</a><span class="color-preview" style="background-color: {{ $color->hex }}"></span> <a class="button" href="/colors/{{$color->id}}/edit">EDIT</a>
            <form action="/colors/{{ $color->id}}" method="post" style="display: inline">
               @csrf
               @method('delete')
                <input type="submit" value="DELETE">
            </form>
            </li>
        @endforeach
        <a href="/colors/create" class="button">CREATE NEW</a>
        </ul>
    @endisset
    
    @empty($colors)
        <a href="/colors/create" class="button">CREATE NEW</a>
    @endempty
@endsection


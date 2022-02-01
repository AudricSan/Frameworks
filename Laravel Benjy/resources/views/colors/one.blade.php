@extends('layout')

@section('content')
    @isset($color)
    <hgroup>
        <h6>Nom</h6>
        <h2>{{ $color->name }}</h2>
    </hgroup>
    <hgroup>
        <h6>Code hexadecimal</h6>
        <h2>{{ $color->hex }}</h2>
        <span class="color-preview" style="background-color: {{ $color->hex }}"></span>
    </hgroup>
    @endisset
@endsection
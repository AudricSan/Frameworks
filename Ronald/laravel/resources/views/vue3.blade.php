@extends('layouts.base')
@section('content')

    <p>
    @foreach ($users as $task)
        {{ $task }}
    @endforeach
    </p>

@endsection


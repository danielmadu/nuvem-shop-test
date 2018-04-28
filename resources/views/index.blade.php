@extends('layout.app')

@section('title')
    Superhero CRUD
@endsection

@section('content')
    <p>
        <a href="{{route('create')}}" class="btn btn-primary">New Superhero</a>
    </p>
    @include('components.table', ['superheroes' => $superheroes])
@endsection
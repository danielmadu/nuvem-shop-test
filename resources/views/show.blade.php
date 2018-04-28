@extends('layout.app')

@section('title')
    Show Superhero <a href="{{ route('index') }}" class="btn btn-default">Back</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <strong>Nickname:</strong> <br> {{$superhero->nickname}}
        </div>
        <div class="col-md-12">
            <strong>Real name:</strong> <br> {{$superhero->real_name}}
        </div>
        <div class="col-md-12">
            <strong>Origin description:</strong> <br> {{$superhero->origin_description}}
        </div>
        <div class="col-md-12">
            <strong>Superpowers:</strong> <br> {{$superhero->sperpowers}}
        </div>
        <div class="col-md-12">
            <strong>Catch phrase:</strong> <br> {{$superhero->catch_phrase}}
        </div>
    </div>
    <div class="row">
        @foreach($superhero->images as $image)
        <div class="col-md-12" style="margin-bottom: 5px">
            <img style="height: auto; width: 300px" src="{{Storage::url($image->path)}}" alt=""> <br>
        </div>
        @endforeach
    </div>
@endsection

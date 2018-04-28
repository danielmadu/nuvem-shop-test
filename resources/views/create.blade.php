@extends('layout.app')

@section('title')
    New Superhero
@endsection

@section('content')
    <h3>  </h3>
    <div class="row">
        {!! Form::open(['route' => 'store', 'files' => true]) !!}
        @include('components.form')

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

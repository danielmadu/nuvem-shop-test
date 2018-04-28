@extends('layout.app')

@section('title')
    Edit Superhero
@endsection

@section('content')
    <h3>  </h3>
    <div class="row">
        {!! Form::model($superhero, ['route' => 'update', 'files' => true]) !!}
        @include('components.form')
        {!! app()->form->hidden('id', null) !!}
        @include('components.images-table')
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

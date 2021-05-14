@extends('adminlte::page')

@section('title','Blog Chumacero')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off','files'=>true]) !!}
            @include('admin.posts.partials.form')
        {!! Form::submit('Crear Post', ['class'=>'btn btn-primary btn-sm']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop

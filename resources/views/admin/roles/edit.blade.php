@extends('adminlte::page')
@section('title', 'Blog Chumacer')

@section('content_header')
    <h1>BlogChumacero</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif
    <p>Editar rol</p>
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route'=>['admin.roles.update', $role], 'method'=>'put']) !!}
            @include('admin.roles.partials.form')
            {!! Form::submit('Modificar Rol', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

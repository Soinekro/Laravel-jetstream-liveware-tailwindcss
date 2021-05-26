@extends('adminlte::page')

@section('title','Blog Chumacero')

@section('content_header')
<a href="{{route('admin.posts.create')}}" class="btn btn-warning btn-sm float-right"> Crear nuevo Post</a>
    <h1>Editar Post</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-warning">
        <strong>{{session('info')}}</strong>
    </div>

@endif

    @livewire('admin.post-index')
@stop
@section('js')
    <script></script>
@stop

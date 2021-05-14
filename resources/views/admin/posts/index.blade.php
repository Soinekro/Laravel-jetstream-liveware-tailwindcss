@extends('adminlte::page')

@section('title','Blog Chumacero')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-warning">
        <strong>{{session('info')}}</strong>
    </div>

@endif
<a href="{{route('admin.posts.create')}}" class="btn btn-danger btn-sm"> Crear nuevo Post</a>
    @livewire('admin.post-index')
@stop
@section('js')
    <script></script>
@stop

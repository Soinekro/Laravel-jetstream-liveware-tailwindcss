@extends('adminlte::page')
@section('title', 'Blog Chumacer')

@section('content_header')
    <h1>Mostrar lista de Etiquetas</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
    <div class="card-header">
        <a class="btn btn-warning" href="{{route('admin.tags.create')}}">Agregar Tag</a>
    </div>
    <div class="card-body">
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td width="30px">{{$tag->id}}</td>
                        <td width="200px">{{$tag->name}}</td>
                        <td width="30px">{{$tag->color}}</td>
                        <td width="10px">
                            <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop


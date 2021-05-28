@extends('adminlte::page')
@section('title', 'Blog Chumacer')

@section('content_header')
<a href="{{route('admin.roles.create')}}" class="btn btn-warning float-right">Crear nuevo Rol</a>
    <h1>BlogChumacero</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-warning">
        {{session('info')}}
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-cell">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th colspan="2">

                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-primary"> Modificar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

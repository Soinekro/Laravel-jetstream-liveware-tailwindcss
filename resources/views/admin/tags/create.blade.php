@extends('adminlte::page')
@section('title', 'Blog Chumacer')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=> 'admin.tags.store']) !!}
    <div class="form-group">
            {!! Form::label('name', 'Nombre de la etiqueta') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese nombre dela etiqueta']) !!}
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug de la etiqueta','readonly']) !!}
        @error('slug')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        {{-- <label for="">Color: </label>
        <select name="color" class="form-control" id="">
            <option value="red">color Rojo</option>
            <option value="green">Color verde </option>
            <option value="blue" selected>color Azul</option>
        </select> --}}
        {!! Form::label('color', 'Color', ) !!}
        {!! Form::select('color', $colors,null , ['class'=>'form-control']) !!}
    @error('color')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
        {!! Form::submit('Crear Tag', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop


@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script>
    $(document).ready( function() {
    $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
    });
});
</script>
@endsection



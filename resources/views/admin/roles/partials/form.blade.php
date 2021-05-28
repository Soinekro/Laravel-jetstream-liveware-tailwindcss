<div class="form-goup">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'ingrese nombre del rol']) !!}
@error('name')
    <small class="text-danger">
        {{$message}}
    </small>
@enderror
</div>
<h2>Listado de permisos</h2>
    @foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
            {{$permission->description}}
    </label>
    </div>
    @endforeach

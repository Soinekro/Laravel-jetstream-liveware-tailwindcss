<div class="form-group">
            {!! Form::label('name', 'Nombre de la etiqueta') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'ingrese nombre del Etiqueta']) !!}
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug de Tag','readonly']) !!}
        @error('slug')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('color', 'Color de Etiqueta') !!}
        {!! Form::select('color', $colors, null, ['class'=>'form-control']) !!}
    @error('color')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

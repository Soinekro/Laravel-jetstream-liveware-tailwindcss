<div>
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre del Post','autocomplete'=>'off']) !!}
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug',null , ['class'=>'form-control','placeholder'=>'ingrese el slug del Post', 'readonly']) !!}
        @error('slug')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        @error('category_id')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('extract', 'Extracto') !!}
        {!! Form::textarea('extract', null, ['class'=>'form-control'])!!}
        @error('extract')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('body', 'contenido del Post') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        @error('body')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <p class="font-weight-bold">
            Etiquetas
        </p>
        @foreach ($tags as $tag)
        <label class="mr-4">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
        @endforeach
        @error('tags')
            <br>
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label class="font-weight-bold"> Estado</label> <br>
        <label>
            {!! Form::radio('status', 1, true) !!}
            Borrador
        </label>
        <label>
            {!! Form::radio('status', 2) !!}
            Publicado
        </label>
    </div>
    <div class="row mb-3">
        <div class="col">
            @if($post->image)
                <img id="picture" width="300px" src="{{Storage::url($post->image->url)}}"/>
            @else
                <img id="picture" width="300px" src="https://th.bing.com/th/id/R36ce3abf7db30b110bf129ab7af9f0bd?rik=MN4%2f3HHp9TqbqQ&riu=http%3a%2f%2fthewowstyle.com%2fwp-content%2fuploads%2f2015%2f04%2f6881315-desktop-backgrounds.jpg&ehk=qWsTPhEenVV1I1XCla%2beYdDX3MR%2fBwLYWfPelzdd9RM%3d&risl=&pid=ImgRaw"/>
            @endif
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'Imagen Predeterminada') !!}
                {!! Form::file('file', ['class'=>'form-control-file', 'accept' => 'image/*']) !!}
                </div>
                <p>Se asignara la imagen mostrada predeterminada a su post o
                    puede seleccionar una imagen para su Post</p>
        </div>
        </div>
        @error('file')
                <br>
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>

    {{-- scrips --}}
    @section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        //editor de texto
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        //sobreescribir slug
        $(document).ready( function() {
        $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
        });
    });
    //cambiar imagen
    document.getElementById("file").addEventListener('change', cambiarimagen);

    function cambiarimagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();

        reader.onload = (event) =>{
            document.getElementById("picture").setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(file);
    }
    </script>
    @endsection

</div>

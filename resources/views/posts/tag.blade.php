<x-app-layout>
    <div class="max-w-2xl lg:max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 py-8">

        <div class="uppercase text-center text-2xl font-bold">
            Etiqueta->{{$tag->name}}
        </div>

        @foreach ($posts as $post)
        <x-card-post :post="$post"/>
        @endforeach

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>

<x-app-layout>
<div class="max-w-2xl lg:max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 py-8">

    <div class="uppercase text-center text-2xl font-bold">
        Categoria->{{$category->name}}
    </div>
    @foreach ($posts as $post)
    <article class="bg-white mb-8 shadow-lg rounded-lg overflow-hidden">
        <img class="w-full h-80 object-center object-cover" src="{{Storage::url($post->image->url)}}" alt="">
        <div class="px-5 py-8">
            <h1 class="font-bold text-xl mb-2">
                <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
            </h1>
            <div class="text-justify text-gray-800 mb-1">
                {{$post->extract}}
            </div>
        </div>
        <div class="pt-4 px-6 pb-2">
            @foreach ($post->tags as $tag)
                <a href="" class="inline-block rounded-full bg-gray-200 px-3 py-1 text-sm text-gray-900 mr-2">{{$tag->name}}</a>
            @endforeach

        </div>

    </article>
    @endforeach
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>
</x-app-layout>

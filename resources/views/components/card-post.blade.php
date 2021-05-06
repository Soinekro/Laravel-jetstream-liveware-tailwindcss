@props(['post'])

<article class="bg-white mb-8 shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-80 object-center object-cover" src="{{Storage::url($post->image->url)}}" alt="">
    <div class="px-5 py-8">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
        </h1>
        <div class="text-base text-gray-800 mb-1">
            {{$post->extract}}
        </div>
    </div>
    <div class="pt-4 px-6 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="inline-block rounded-full bg-gray-200 px-3 py-1 text-sm text-gray-900 mr-2">{{$tag->name}}</a>
        @endforeach

    </div>

</article>

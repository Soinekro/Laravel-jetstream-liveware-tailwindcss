<x-app-layout>
    <div class="container py-8">
        <h1 class="text-3xl font-bold text-gray-600">{{$post->name}}</h1>
    </div>
    <div class="text-lg text-blue-600 mb-2">
        {{$post->extract}}
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- contenido principal --}}
        <div class="">
            <figure>
                <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt=""/>
            </figure>
            <div class="text-base text-gray-700 mt-4">
                {{$post->body}}
            </div>
        </div>
        {{--contenido relacionado--}}
        <aside>
            <h1 class="text-2xl font-bold text-blue-600 mb-4">Mas en {{$post->category->name}}</h1>
            <ul>
                @foreach ($similares as $similar)
                    <li class="mb-3">
                        <a class="flex" href="{{route('posts.show',$similar)}}">
                            <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                            <span class="ml-2 text-green-500">{{$similar->name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</x-app-layout>

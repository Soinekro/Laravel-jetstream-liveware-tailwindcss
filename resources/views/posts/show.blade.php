<x-app-layout>
    <div class="container py-8">
        <h1 class="text-3xl font-bold text-gray-600">{{$post->name}}</h1>
    </div>
    <div class="text-lg text-blue-600 mb-2">
        {!!$post->extract!!}
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- contenido principal --}}
        <div class="">
            <figure>
                @if ($post->image)
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt=""/>
                @else
                    <img class="w-full h-80 object-cover object-center" src="https://th.bing.com/th/id/R36ce3abf7db30b110bf129ab7af9f0bd?rik=MN4%2f3HHp9TqbqQ&riu=http%3a%2f%2fthewowstyle.com%2fwp-content%2fuploads%2f2015%2f04%2f6881315-desktop-backgrounds.jpg&ehk=qWsTPhEenVV1I1XCla%2beYdDX3MR%2fBwLYWfPelzdd9RM%3d&risl=&pid=ImgRaw" alt=""/>
                @endif
            </figure>
            <div class="text-base text-gray-700 mt-4">
                {!!$post->body!!}
            </div>
        </div>
        {{--contenido relacionado--}}
        <aside>
            <h1 class="text-2xl font-bold text-blue-600 mb-4">Mas en {{$post->category->name}}</h1>
            <ul>
                @foreach ($similares as $similar)
                    <li class="mb-3">
                        <a class="flex" href="{{route('posts.show',$similar)}}">
                            @if ($similar->image)
                                <img class="w-full h-80 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt=""/>
                            @else
                                <img class="w-full h-80 object-cover object-center" src="https://th.bing.com/th/id/R36ce3abf7db30b110bf129ab7af9f0bd?rik=MN4%2f3HHp9TqbqQ&riu=http%3a%2f%2fthewowstyle.com%2fwp-content%2fuploads%2f2015%2f04%2f6881315-desktop-backgrounds.jpg&ehk=qWsTPhEenVV1I1XCla%2beYdDX3MR%2fBwLYWfPelzdd9RM%3d&risl=&pid=ImgRaw" alt=""/>
                            @endif
                            <span class="ml-2 text-green-500">{{$similar->name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</x-app-layout>

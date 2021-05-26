<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.posts.index');
    }
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::pluck('name','id');
        return view('admin.posts.create', compact('tags','categories'));
    }

    public function store(PostRequest $request)
    {
        /* Storage::put('posts', $request->file('file')); */
        $post = Post::create($request->all());
        if ($request->file('file')) {
            $url= Storage::put('posts', $request->file('file'));
            $post->image()->create([
                'url'=>$url
            ]);
        }
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('author',$post);
        $tags = Tag::all();
        $categories = Category::pluck('name','id');
        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(PostRequest $request,Post $post)
    {
        $this->authorize('author',$post);
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        $post->update($request->all());

        if ($request->file('file')) {//si nos envian una imagen en file
            $url= Storage::put('posts', $request->file('file'));//damos url
            if ($post->image) {//si existe una imagen
                Storage::delete($post->image->url);//elimina la imagen anterior

                $post->image->update([//actualizamos url de la imagen
                    'url'=>$url
                ]);
            }else{//si no existe una imagen
                $post->image()->create([
                    'url' =>$url,
                ]);
            }
        }
        return redirect()->route('admin.posts.edit', compact('post'))->with('info', 'el post se actualizo con exito');
    }

    public function destroy(Post $post)
    {
        $this->authorize('author',$post);
        $post->delete();
        /* Storage::delete($post->image->url); */
      return  redirect()->route('admin.posts.index')->with('info','Post Eliminado correctamente');
    }
}

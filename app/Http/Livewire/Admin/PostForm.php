<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class PostForm extends Component
{
    public function render(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name','id');
        return view('livewire.admin.post-form', compact('post','categories', 'tags'));
    }
}

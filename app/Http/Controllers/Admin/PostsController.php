<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /*
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all(
        return view('admin.posts.create', compact('categories', 'tags'));
    }
    */

    public function store(Request $request)
    {
        // Valido
        $this->validate($request, [
            'title' => 'required'
        ]);

        // Creo
        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->save();

        // Retorno
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post, Request $request)
    {

        $this->validate($request,
            [
                'title' => 'required',
                'body' => 'required',
                'excerpt' => 'required',
                'category' => 'required',
                'tags' => 'required'
            ]
        );

        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->filled('published_at') ? Carbon::parse($request->published_at)->now() : null;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido actualizada');
    }
}

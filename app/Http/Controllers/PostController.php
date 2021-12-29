<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function create() {
        return view('admin.posts.create');
    }

    function store(Request $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content_post;
        $post->user_id = Auth::id();
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
        }

        $post->save();

    }

    function index() {
        $posts = Auth::user()->posts;
        return view('admin.posts.list', compact('posts'));
    }
}

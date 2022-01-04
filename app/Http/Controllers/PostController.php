<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    function create() {
        if (!Gate::allows('add-new-post')) {
            abort(403);
        }
        $types = Type::all();
        return view('admin.posts.create', compact('types'));
    }

    function store(Request $request) {

        DB::beginTransaction();
        try {
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
            $post->types()->sync($request->types);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('posts.index');
    }

    function index() {
        $posts = Auth::user()->posts;
        return view('admin.posts.list', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(16);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->request->add([
            'user_id' => auth()->user()->id
        ]);

        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
            'user_id' => 'required',
        ]);

        Post::create($validated);
        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show( User $user, Post $post)
    {
        return view('posts.show', [
            'post' =>$post,
            'user' => $user
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function destroy(Request $request, Post $post)
    {
        // Validar que el usuario sea el autor de la publicacion (PostPolicy)
        if($request->user()->cannot('delete', $post)){
            abort(403, 'Sin los permisos');
        }
        
        $post->delete();
        
        // Eliminar la imagen
        $imagenPath = public_path('uploads/' . $post->imagen);
        
        if(File::exists($imagenPath)){
            unlink($imagenPath);
        }
        
        return redirect()->route('posts.index', Auth::user()->username);
    }
}

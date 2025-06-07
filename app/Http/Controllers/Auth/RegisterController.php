<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Modificar el Request
        $request->request->add([
            'username' => Str::slug($request->username),
        ]);

        // Validacion
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:30',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Autenticar al usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index');
    }
}

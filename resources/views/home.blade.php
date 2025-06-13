@extends('layouts.app')

@section('titulo', 'Página Principal')

@section('contenido')

    @if ($posts->count() < 1)
        <div>
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones para mostrar. Sigue a alguien para ver sus publicaciones</p>
        </div>

    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links() }}
        </div>
    @endif

@endsection
@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold"> 
                        Username 
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu Nombre de Usuario"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('username') border-red-400 @enderror"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold"> 
                        Imagen Perfil 
                    </label>
                    <input 
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('imagen') border-red-400 @enderror"
                        value=""
                        accept=".jpg, .jpeg, .png, .gif">
                    @error('imagen')
                        <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ $message }} </p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
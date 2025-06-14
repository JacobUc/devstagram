@extends('layouts.app')

@section('titulo')
    Regístrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" 
                alt="Imagen Registro de Usuarios"
                class="rounded-lg">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold"> 
                        Nombre 
                    </label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu nombre"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('name') border-red-400 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-1.5 text-center">{{ $message }}</p>
                    @enderror
                </div>

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
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold"> 
                        Correo Electrónico 
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Correo Electrónico"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('email') border-red-400 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold"> 
                        Contraseña
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Contraseña"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('password') border-red-400 @enderror"
                        value="{{ old('password') }}">
                    @error('password')
                        <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ $message }} </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold"> 
                        Repetir Contraseña
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu Contraseña"
                        class="border border-gray-400 p-3 w-full rounded-lg @error('password_confirmation') border-red-400 @enderror"
                        value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ $message }} </p>
                    @enderror    
                </div>
                
                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
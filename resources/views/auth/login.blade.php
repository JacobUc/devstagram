@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" 
                alt="Imagen Login de Usuarios"
                class="rounded-lg">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf


                @if (session('mensaje'))
                    <p class="bg-red-400 text-white my-2 rounded-md text-sm p-1.5 text-center"> {{ session('mensaje') }} </p>                    
                @endif

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
                    <input id="remember" type="checkbox" name="remember">
                    <label for="remember" class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input 
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
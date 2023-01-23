@extends('layouts.app')

@section('title', 'register')

@section('content')
<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
        <h1 class="text-3xl text-center font-bold">bienvenido al registro de usuarios </h1>
        <form class="mt-4" method="POST" action="">
        @csrf
            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="name"
            id="name" name="name">

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="tipo_documento"
            id="tipo_documento" name="tipo_documento">

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="num_documento"
            id="num_documento" name="num_documento">

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="direccion"
            id="direccion" name="direccion">

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="telefono"
            id="telefono" name="telefono">

            <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="email"
            id="email" name="email">

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="contraseña"
            id="password" name="password">

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
            text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="confirmar contraseña"
            id="password_confirmation" name="password_confirmation">
            
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">errorrrr</p>
            <button type="submit" class="rounded-md bg-purple-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-purple-600">Iniciar</button>
        </form>
    </div>

@endsection
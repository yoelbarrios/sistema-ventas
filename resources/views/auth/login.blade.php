@extends('layouts.app')

@section('title', 'login')

@section('content')
    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
        <div class=" mx-auto mt-2 mb-16 w-1/2">
          <img src="{{asset('storage/img/usuario/logo.png')}}" alt="">
        </div>

        <form class="flex flex-col mx-auto px-12 mt-4 items-center" method="POST" action="">
            @csrf
            <div class="w-full text-lg my-3">
              <p class="ml-0">Email</p>
              <input type="email" class="border border-gray-200 rounded-md bg-gray-100  w-full
              text-lg placeholder-gray-900 p-2  focus:bg-white" placeholder=""
              id="email" name="email">
            </div>
            <div class="w-full text-lg my-3">
              <p>Contraseña</p>
              <input type="password" class="border border-gray-200 rounded-md bg-gray-100  w-full
              text-lg placeholder-gray-900 p-2 focus:bg-white" placeholder=""
              id="password" name="password">
            </div>


            @error('message')
            <p class="border border-red-500 rounded-md bg-red-100  w-full text-red-600 p-2 my-6">Disculpa, estas credenciales no coinciden</p>
            @enderror
            <button type="submit" class="rounded-md bg-purple-500 w-1/2 text-3xl text-white font-semibold p-2 my-6 hover:bg-purple-600">Iniciar</button>
        </form>
    </div>

@endsection

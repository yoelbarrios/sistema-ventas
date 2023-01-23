@extends('principal')
@section('contenido')
<main class="h-full overflow-y-auto">
    <div class="container px-6 py-4 mx-auto grid">
    <!--start form Agregar Categoria-->
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <form action="{{route('categoria.store')}}" method="POST">
                          {{csrf_field()}}
                          @include('categoria.form')
                        </form>
                    </div>
                    <!--start form Agregar Categoria-->
    </div>
</main>
@endsection

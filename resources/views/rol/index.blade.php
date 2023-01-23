<!--llamamos la plantilla home-->
@extends('principal')
@section('contenido')
<!--start contenido del main-->
<main class="h-full overflow-y-auto">
          <div class="container px-6 py-4 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Roles
            </h2>
            <div class="flex items-center py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

              <!--start search-->
              {!! Form::open(array('url'=>'rol','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500 px-2">

                  <input name="buscarTexto" value="{{$buscarTexto}}"
                    class="w-full pl-2 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text"
                    placeholder="Buscar"
                    aria-label="Search"
                  />
                  <button type="submit"
                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  >
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  </button>
                </div>
                {{Form::close()}}
              <!--end search-->

            </div>

            <!-- start New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">Nombre</th>
                      <th class="px-4 py-3">Descripción</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($rols as $rol)
                    <!-- start elemento 1 -->
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold">{{$rol->nombre}}</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$rol->descripcion}}
                      </td>

                    </tr>
                    <!-- end elemento 1 -->
                    @endforeach
                  </tbody>
                </table>
              </div>
              
            </div>
            <!--end New Table -->
          </div>
        </main>
        <!--end contenido del main-->
@endsection

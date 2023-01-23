<!--llamamos la plantilla home-->
@extends('principal')
@section('contenido')
<!--start contenido del main-->
<main class="h-full overflow-y-auto">
          <div class="container px-6 py-4 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Clientes
            </h2>
            <div class="flex items-center px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <!--start btn agregar-->
              <div class="my-2">
                <a href="{{url('cliente/create')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Agregar
                  <span class="ml-2" aria-hidden="true">+</span>
                </a>
              </div>
              <!--end btn agregar-->

              <!--start search-->
              {!! Form::open(array('url'=>'cliente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500 px-10">

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
                      <th class="px-4 py-3">Tipo Documento</th>
                      <th class="px-4 py-3">Nª Documento</th>
                      <th class="px-4 py-3">Direccion</th>
                      <th class="px-4 py-3">Telefono</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($clientes as $cli)
                    <!-- start elemento 1 -->
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold">{{$cli->nombre}}</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$cli->tipo_documento}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$cli->num_documento}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$cli->direccion}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$cli->telefono}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$cli->email}}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <a href="{{url('/cliente/'.$cli->id.'/edit')}}"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </a>
                          <form action="{{url('/cliente/'.$cli->id)}}" method="POST">
                              @csrf
                              {{method_field('DELETE')}}
                              <button type="submit" onclick="return confirm('si usted eliminar este cliente tambien se eliminaran las ventas relacionas con este ¿Esta seguro que desea eliminar?')"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete"
                              >
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                              </button>
                          </form>

                        </div>
                      </td>
                    </tr>
                    <!-- end elemento 1 -->
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- start contenedor de Pagination -->
              <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <?php
                $currentPage = $clientes->currentPage(); //Página actual
                $maxPages = $currentPage + 3; //Máxima numeración de páginas
                $firstPage = 1; //primera página
                $lastPage = $clientes->lastPage(); //última página
                $nextPage = $currentPage+1; //Siguiente página
                $forwardPage = $currentPage-1; //Página anterior
                $clientes->setPath('');
                ?>
                <span class="col-span-1"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <!--
                        <li class="@if($currentPage==$firstPage){{'disabled'}}@endif">
                            <a href="@if($currentPage>1){{$clientes->url($firstPage)}}@else{{'#'}}@endif"
                              class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                            >
                              Primera
                          </a>
                        </li>
                        -->
                      <li class="@if($currentPage==$firstPage){{'disabled'}}@endif">
                        <a href="@if($currentPage>1){{$clientes->url($forwardPage)}}@else{{'#'}}@endif"

                          aria-label="Previous"
                        >
                          <svg
                            aria-hidden="true"
                            class="w-4 h-4 fill-current"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </a>
                      </li>
                        @for($x=$currentPage;$x<$maxPages;$x++)
                            @if($x <= $lastPage)
                            <li class="@if($x==$currentPage){{'active'}}@endif">
                                    <a href="{{$clientes->url($x)}}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple">{{$x}}</a>
                            </li>
                            @endif
                        @endfor


                      <li class="@if($currentPage==$lastPage){{'disabled'}}@endif">
                        <a href="@if($currentPage<$lastPage){{$clientes->url($nextPage)}}@else{{'#'}}@endif"

                          aria-label="Next"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <!--
                      <li class="@if($currentPage==$lastPage){{'disabled'}}@endif">
                        <a href="@if($currentPage<$lastPage){{$clientes->url($lastPage)}}@else{{'#'}}@endif"
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          Ultima
                      </a>
                      </li>
                       -->
                    </ul>
                  </nav>
                </span>
              </div>
              <!-- end contenedor de Pagination -->
            </div>
            <!--end New Table -->
          </div>
        </main>
        <!--end contenido del main-->
@endsection

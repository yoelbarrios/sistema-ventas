@extends('principal')
@section('contenido')
<main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">

            <h4
              class="mb-4 mt-8 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Detalle de venta
            </h4>
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Cliente
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$venta->nombre}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Comprobante
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$venta->tipo_identificacion}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Número de venta
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$venta->num_venta}}
                  </p>
                </div>
              </div>
              <div
                class="flex flex-row justify-center items-center"
              >
              <div class="mr-6 ">
                <a href="{{url()->previous()}}" class="flex items-center justify-between  px-4 py-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
                  <span class="px-2">Regresar</span>
                </a>
              </div>
              <div class="">
                <a href="{{url('pdfVenta',$venta->id)}}" class="flex items-center justify-between w-1/2 px-4 py-2 text-sm font-medium leading-5 text-purple-600 transition-colors duration-150  border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-100 focus:outline-none focus:shadow-outline-purple">
                  Descargar PDF
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
                </a>
              </div>


              </div>
              <!-- Card -->

            </div>

            <!-- Cards with title -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >

            </h4>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Producto</th>
                      <th class="px-4 py-3">Precio Venta (S/.)</th>
                      <th class="px-4 py-3">Descuento (S/.)</th>
                      <th class="px-4 py-3">Cantidad</th>
                      <th class="px-4 py-3">SubTotal (S/.)</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @foreach($detalles as $det)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">

                          <!-- Avatar with inset shadow -->

                          <div>
                            <p class="font-semibold">{{$det->producto}}</p>

                          </div>

                      </td>
                      <td class="px-4 py-3 text-sm">
                        S/. {{$det->precio}}
                      </td>
                      <td class="px-4 py-3 text-xs">
                        {{$det->descuento}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$det->cantidad}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        S/. {{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,2)}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                         <th  colspan="4"><p align="right" class="font-semibold">TOTAL:</p></th>
                         <th><p align="right" class="font-semibold">S/. {{number_format($venta->total,2)}}</p></th>
                     </tr>

                     <tr>
                         <th colspan="4"><p align="right" class="font-semibold">TOTAL IMPUESTO (18%):</p></th>
                         <th><p align="right" class="font-semibold">S/. {{number_format($venta->total*18/100,2)}}</p></th>
                     </tr>

                     <tr>
                         <th  colspan="4"><p align="right" class="font-semibold">TOTAL PAGAR:</p></th>
                         <th><p align="right" class="font-semibold">S/. {{number_format($venta->total+($venta->total*18/100),2)}}</p></th>
                     </tr>
                 </tfoot>
                </table>
              </div>

            </div>
          </div>
        </main>

@endsection

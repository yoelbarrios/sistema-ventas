
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ladrillos Mochica</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/tailwind.output.css')}}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('js/init-alpine.js')}}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link rel="stylesheet" href="../css/app.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="{{asset('js/charts-lines.js')}}" defer></script>
    <script src="{{asset('js/charts-pie.js')}}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="flex h-screen px-8 bg-gray-50 dark:bg-gray-900">


      <!--start contenedor header y main -->
      <div class="flex flex-col flex-1 w-1/2">

        <!--start contenido del main-->
        <main class="h-full overflow-y-auto">

         <div class="container px-4  mx-auto mt-4 grid bg-white rounded-lg shadow-md dark:bg-gray-800">

         <h2 class="mt-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">Agregar Venta</h2>
            <form action="{{route('venta.store')}}" method="POST">
            {{csrf_field()}}
              <div class="d-flex flex-row">
                <div class="p-2 form-group row col-md-8">

                    <div class="col-md-8">
                        <label class="block text-sm" for="nombre">
                          <span class="text-gray-700 dark:text-gray-400">
                            Nombre del cliente
                          </span>
                        </label>
                          <select class="form-control selectpicker" name="id_cliente" id="id_cliente" data-live-search="true" required>
                          <option value="0" disabled>Seleccione</option>
                          @foreach($clientes as $client)
                          <option value="{{$client->id}}">{{$client->nombre}}</option>
                          @endforeach
                          </select>
                      </div>

                      <div class="col-md-8">
                        <label class="block text-sm" for="documento">
                          <span class="text-gray-700 dark:text-gray-400">
                            Comprobante
                          </span>
                        </label>
                        <select class="form-control" name="tipo_identificacion" id="tipo_identificacion" required>
                            <option value="0" disabled>Seleccione</option>
                            <option value="FACTURA">Factura</option>
                            <option value="BOLETA">Boleta</option>
                        </select>
                      </div>

                      <div class="col-md-8">
                        <label class="block text-sm" for="num_venta">
                          <span class="text-gray-700 dark:text-gray-400">
                            Número de venta
                          </span>
                        </label>
                        <input type="text" id="num_venta" name="num_venta" class="form-control" placeholder="Ingrese el número de venta" pattern="[0-9]{0,15}">
                      </div>

                       <div class="col-md-8">
                          <label class="block text-sm" for="nombre">
                            <span class="text-gray-700 dark:text-gray-400">
                              Producto
                            </span>
                          </label>
                          <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true" required>
                          <option value="0" selected>Seleccione</option>
                          @foreach($productos as $prod)
                          <option value="{{$prod->id}}_{{$prod->stock}}_{{$prod->precio}}">{{$prod->producto}}</option>
                          @endforeach
                          </select>
                      </div>
                </div>
                <div class="p-2 form-group row">
                    <div class="col-md-8">
                            <label class="form-control-label" for="cantidad">Cantidad</label>

                            <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
                    </div>

                    <div class="col-md-8">
                            <label class="form-control-label" for="stock">Stock</label>

                            <input type="number" disabled id="stock" name="stock" class="form-control" placeholder="" pattern="[0-9]{0,15}">
                    </div>



                    <div class="col-md-8">
                            <label class="form-control-label" for="precio_venta">Precio Venta</label>

                            <input type="number" disabled id="precio_venta" name="precio_venta" class="form-control" placeholder="" >
                    </div>

                    <div class="col-md-8">
                            <label class="form-control-label" for="impuesto">Descuento</label>

                            <input type="number" id="descuento" name="descuento" class="form-control" placeholder="Ingrese descuento">
                    </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-2">

                  <a href="{{url()->previous()}}" class="flex items-center justify-center py-1 px-1 text-sm font-medium leading-5 text-purple-600 transition-colors duration-150  border-2 border-purple-600 rounded-lg active:bg-purple-600 focus:outline-none focus:shadow-outline-purple">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
                    <span class="px-2">Regresar</span>
                  </a>
                </div>
                <div class="col-md-3">

                    <button type="button" id="agregar" class="flex items-center justify-center w-full px-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border-2 border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                      Agregar detalle
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </button>
                </div>
              </div>

                   <div class="form-group row">

                      <h2 class=" px-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">Lista de ventas</h2>

                      <div class="table-responsive col-md-12">
                        <table id="detalles" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b dark:border-gray-700 bg-purple-600 dark:text-gray-400 dark:bg-gray-800">
                                <th>Eliminar</th>
                                <th>Producto</th>
                                <th>Precio Venta (S/.)</th>
                                <th>Descuento</th>
                                <th>Cantidad</th>
                                <th>SubTotal (S/.)</th>
                            </tr>
                        </thead>

                        <tfoot>

                            <tr>
                                <th  colspan="5"><p align="right">TOTAL:</p></th>
                                <th><p align="right"><span id="total">S/. 0.00</span> </p></th>
                            </tr>

                            <tr>
                                <th colspan="5"><p align="right">TOTAL IMPUESTO (18%):</p></th>
                                <th><p align="right"><span id="total_impuesto">S/. 0.00</span></p></th>
                            </tr>

                            <tr>
                                <th  colspan="5"><p align="right">TOTAL PAGAR:</p></th>
                                <th><p align="right"><span align="right" id="total_pagar_html">S/. 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                            </tr>

                        </tfoot>

                        <tbody>
                        </tbody>


                        </table>
                      </div>

                    </div>

                    <div class="modal-footer form-group row" id="guardar">

                    <div class="col-md">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <button type="submit" class="w-full
                        text-sm
                        font-medium
                        leading-5
                        text-white
                        transition-colors
                        duration-150
                        bg-purple-600
                        border border-transparent
                        rounded-lg
                        sm:w-auto
                        sm:px-4
                        sm:py-2
                        active:bg-purple-600
                        hover:bg-purple-700
                        focus:outline-none
                        focus:shadow-outline-purple"> Registrar</button>

                    </div>

                    </div>

                 </form>

            </div><!--fin del div card body-->
          </main>


         <script>

         $(document).ready(function(){

     $("#agregar").click(function(){

         agregar();
     });

  });

   var cont=0;
   total=0;
   subtotal=[];
   $("#guardar").hide();
   $("#id_producto").change(mostrarValores);

     function mostrarValores(){

         datosProducto = document.getElementById('id_producto').value.split('_');
         $("#precio_venta").val(datosProducto[2]);
         $("#stock").val(datosProducto[1]);

     }

     function agregar(){

         datosProducto = document.getElementById('id_producto').value.split('_');

         id_producto= datosProducto[0];
         producto= $("#id_producto option:selected").text();
         cantidad= $("#cantidad").val();
         descuento= $("#descuento").val();
         precio_venta= $("#precio_venta").val();
         stock= $("#stock").val();
         impuesto=18;

          if(id_producto !="" && cantidad!="" && cantidad>0  && descuento!="" && precio_venta!=""){

                if(parseInt(stock)>=parseInt(cantidad)){

                    /*subtotal[cont]=(cantidad*precio_venta)-descuento;
                    total= total+subtotal[cont];*/

                    subtotal[cont]=(cantidad*precio_venta)-(cantidad*precio_venta*descuento/100);
                    total= total+subtotal[cont];

                    var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button"  onclick="eliminar('+cont+');"><svg class="w-6 h-6" fill="none" stroke="#7e3af2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input   name="precio_venta[]" value="'+parseFloat(precio_venta).toFixed(2)+'"> </td> <td><input   name="descuento[]" value="'+parseFloat(descuento).toFixed(2)+'"> </td> <td><input  name="cantidad[]" value="'+cantidad+'"> </td> <td>S/. '+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    /*$("#total").html("USD$ " + total.toFixed(2));
                    $("#total_venta").val(total.toFixed(2));*/
                    evaluar();
                    $('#detalles').append(fila);

                } else{

                    alert("La cantidad a vender supera el stock");


                }

            }else{

                alert("Rellene todos los campos del detalle de la venta");



            }

     }


     function limpiar(){

        $("#cantidad").val("");
        $("#descuento").val("0");
        $("#precio_venta").val("");

     }

     function totales(){

        $("#total").html("S/. " + total.toFixed(2));
        //$("#total_venta").val(total.toFixed(2));

        total_impuesto=total*impuesto/100;
        total_pagar=total+total_impuesto;
        $("#total_impuesto").html("S/. " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("S/. " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
      }


     function evaluar(){

         if(total>0){

           $("#guardar").show();

         } else{

           $("#guardar").hide();
         }
     }

     function eliminar(index){

        total=total-subtotal[index];
        total_impuesto= total*18/100;
        total_pagar_html = total + total_impuesto;

        $("#total").html("S/. " + total);
        $("#total_impuesto").html("S/. " + total_impuesto);
        $("#total_pagar_html").html("S/. " + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));

        $("#fila" + index).remove();
        evaluar();
     }

         </script>
        <!--end contenido del main-->
      </div>
    </div>


    </script>
  </body>
</html>

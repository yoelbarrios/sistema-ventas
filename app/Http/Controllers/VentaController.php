<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Detalle_venta;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use PDF;

class VentaController extends Controller
{
  public function index(Request $request){

        if($request){

            $sql=trim($request->get('buscarTexto'));
            $ventas=Venta::join('clientes','ventas.idcliente','=','clientes.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id','ventas.tipo_identificacion',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','ventas.total','clientes.nombre as cliente','users.name as vendedor')
            ->where('ventas.num_venta','LIKE','%'.$sql.'%')
            ->orderBy('ventas.id','desc')
            ->groupBy('ventas.id','ventas.tipo_identificacion',
            'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
            'ventas.estado','ventas.total','clientes.nombre','users.name')
            ->paginate(8);


            return view('venta.index',["ventas"=>$ventas,"buscarTexto"=>$sql]);
            //return $ventas;
        }


     }

        public function create(){

              /*listar las clientes en ventana modal*/
             $clientes=DB::table('clientes')->get();

             /*listar los productos en ventana modal*/
             $productos=DB::table('productos as prod')

             ->select(DB::raw('CONCAT(prod.codigo," ",prod.nombre) AS producto'),'prod.id','prod.stock','prod.precio')

             ->where('prod.stock','>','0')
             ->groupBy('producto','prod.id','prod.stock','prod.precio')
             ->get();

             return view('venta.create',["clientes"=>$clientes,"productos"=>$productos]);

        }

         public function store(Request $request){


             try{

                 DB::beginTransaction();
                 $mytime= Carbon::now('America/Lima');

                 $venta = new Venta();
                 $venta->idcliente = $request->id_cliente;
                 $venta->idusuario = \Auth::user()->id;
                 $venta->tipo_identificacion = $request->tipo_identificacion;
                 $venta->num_venta = $request->num_venta;
                 $venta->fecha_venta = $mytime;
                 $venta->impuesto = "0.18";
                 $venta->total=$request->total_pagar;
                 $venta->estado = 'Registrado';
                 $venta->save();

                 $id_producto=$request->id_producto;
                 $cantidad=$request->cantidad;
                 $descuento=$request->descuento;
                 $precio=$request->precio_venta;


                 //Recorro todos los elementos
                 $cont=0;

                  while($cont < count($id_producto)){

                     $detalle = new Detalle_venta();
                     /*enviamos valores a las propiedades del objeto detalle*/
                     /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                     /*el id es del registro de la venta*/
                     $detalle->idventa = $venta->id;
                     $detalle->idproducto = $id_producto[$cont];
                     $detalle->cantidad = $cantidad[$cont];
                     $detalle->precio = $precio[$cont];
                     $detalle->descuento = $descuento[$cont];
                     $detalle->save();
                     $cont=$cont+1;
                 }

                 DB::commit();

             } catch(Exception $e){

                 DB::rollBack();
             }

             return Redirect::to('venta');
         }

         public function show($id){

             //dd($id);
             //dd($request->all());

             /*mostrar venta*/

             //$id = $request->id;
             $venta = Venta::join('clientes','ventas.idcliente','=','clientes.id')
             ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id','ventas.tipo_identificacion',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','clientes.nombre',
             DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total')
             )
             ->where('ventas.id','=',$id)
             ->orderBy('ventas.id', 'desc')
             ->groupBy('ventas.id','ventas.tipo_identificacion',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','clientes.nombre')
             ->first();

             /*mostrar detalles*/
             $detalles = Detalle_venta::join('productos','detalle_ventas.idproducto','=','productos.id')
             ->select('detalle_ventas.cantidad','detalle_ventas.precio','detalle_ventas.descuento','productos.nombre as producto')
             ->where('detalle_ventas.idventa','=',$id)
             ->orderBy('detalle_ventas.id', 'desc')->get();

             return view('venta.show',['venta' => $venta,'detalles' =>$detalles]);
         }

         public function destroy($id){
           $venta = Venta::findOrFail($id);
             $venta->estado = 'Anulado';
             $venta->save();
             Venta::destroy($id);
             return redirect('venta');


        }

         public function pdf(Request $request,$id){

             $venta = Venta::join('clientes','ventas.idcliente','=','clientes.id')
             ->join('users','ventas.idusuario','=','users.id')
             ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id','ventas.tipo_identificacion',
             'ventas.num_venta','ventas.created_at','ventas.impuesto',
             'ventas.estado',DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total'),'clientes.nombre','clientes.tipo_documento','clientes.num_documento',
             'clientes.direccion','clientes.email','clientes.telefono')
             ->where('ventas.id','=',$id)
             ->orderBy('ventas.id', 'desc')
             ->groupBy('ventas.id','ventas.tipo_identificacion',
             'ventas.num_venta','ventas.created_at','ventas.impuesto',
             'ventas.estado','clientes.nombre','clientes.tipo_documento','clientes.num_documento',
             'clientes.direccion','clientes.email','clientes.telefono')
             ->take(1)->get();

             $detalles = Detalle_venta::join('productos','detalle_ventas.idproducto','=','productos.id')
             ->select('detalle_ventas.cantidad','detalle_ventas.precio','detalle_ventas.descuento',
             'productos.nombre as producto')
             ->where('detalle_ventas.idventa','=',$id)
             ->orderBy('detalle_ventas.id', 'desc')->get();

             $numventa=Venta::select('num_venta')->where('id',$id)->get();

             $pdf= PDF::loadView('pdf.venta',['venta'=>$venta,'detalles'=>$detalles]);
             return $pdf->download('venta-'.$numventa[0]->num_venta.'.pdf');
         }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;
class ClienteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      if($request){

          $sql=trim($request->get('buscarTexto'));
          $clientes=FacadesDB::table('clientes')->where('nombre','LIKE','%'.$sql.'%')
          ->orderBy('id','desc')
          ->paginate(8);
          return view('cliente.index',["clientes"=>$clientes,"buscarTexto"=>$sql]);
          //return $categorias;
      }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('cliente.agregar');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //insertar registros
      $cliente = new Cliente();
      $cliente->nombre = $request->nombre;
      $cliente->tipo_documento = $request->tipo_documento;
      $cliente->num_documento = $request->num_documento;
      $cliente->direccion = $request->direccion;
      $cliente->telefono = $request->telefono;
      $cliente->email = $request->email;
      $cliente->save();
      //retornar a la vista categoria
      return redirect("cliente");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $cliente=Cliente::findOrFail($id);
      return view('cliente.editar', compact('cliente'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //editar actualizar registros
      $datoscliente = request()->except(['_token','_method']);
      Cliente::where('id','=',$id)->update($datoscliente);
      return redirect('cliente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Cliente::destroy($id);
      return redirect('cliente');
  }
}

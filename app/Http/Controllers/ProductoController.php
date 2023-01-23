<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB as FacadesDB;

class ProductoController extends Controller
{
  public function index(Request $request)
  {
      if($request){

          $sql=trim($request->get('buscarTexto'));
          $productos=FacadesDB::table('productos as p')
          ->join('categorias as c','p.idcategoria','=','c.id')
          ->select('p.id','p.idcategoria','p.nombre','p.precio','p.codigo','p.stock','c.nombre as categoria')
          ->where('p.nombre','LIKE','%'.$sql.'%')
          ->orwhere('p.codigo','LIKE','%'.$sql.'%')
          ->orderBy('p.id','desc')
          ->paginate(8);

          return view('producto.index',["productos"=>$productos,"buscarTexto"=>$sql]);
      }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //listar categorias en un select
      $categorias=FacadesDB::table('categorias')
      ->select('id','nombre','descripcion')
      ->get();
      return view('producto.agregar', compact('categorias'));
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
      $producto= new Producto();
      $producto->idcategoria = $request->idcategoria;
      $producto->codigo = $request->codigo;
      $producto->nombre = $request->nombre;
      $producto->precio = $request->precio;
      $producto->stock = $request->stock;

      $producto->save();

      return redirect("producto");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function show(Producto $categoria)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $producto=Producto::findOrFail($id);

      $categorias=FacadesDB::table('categorias')
      ->select('id','nombre','descripcion')
      ->get();
      return view('producto.editar', compact('producto','categorias'));
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
      /*
      $producto= Producto::findOrFail($request->id);
      $producto->idcategoria = $request->idcategoria;
      $producto->codigo = $request->codigo;
      $producto->nombre = $request->nombre;
      $producto->precio = $request->precio;
      $producto->stock = $request->stock;
      $producto->save();

      return redirect('producto');
      */
      $datoscategoria = request()->except(['_token','_method']);
      Producto::where('id','=',$id)->update($datoscategoria);
      return redirect('producto');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Producto::destroy($id);
      return redirect('producto');
  }
}

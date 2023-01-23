<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;

class CategoriaController extends Controller
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
          $categorias=FacadesDB::table('categorias')->where('nombre','LIKE','%'.$sql.'%')
          ->orderBy('id','desc')
          ->paginate(10);
          return view('categoria.index',["categorias"=>$categorias,"buscarTexto"=>$sql]);
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
      return view('categoria.agregar');
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
      $categoria = new Categoria();
      $categoria->nombre = $request->nombre;
      $categoria->descripcion = $request->descripcion;

      $categoria->save();
      //retornar a la vista categoria
      return redirect("categoria");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function show(Categoria $categoria)
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
      $categoria=Categoria::findOrFail($id);
      return view('categoria.editar', compact('categoria'));
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
      $datoscategoria = request()->except(['_token','_method']);
      Categoria::where('id','=',$id)->update($datoscategoria);
      return redirect('categoria');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Categoria::destroy($id);
      return redirect('categoria');
  }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB as FacadesDB;

class UserController extends Controller
{
  public function index(Request $request)
  {
      //
      if($request){

          $sql=trim($request->get('buscarTexto'));
          $usuarios=FacadesDB::table('users')
          ->join('rols','users.idrol','=','rols.id')
          ->select('users.id','users.name','users.tipo_documento',
          'users.num_documento','users.direccion','users.telefono',
          'users.email','users.password',
          'users.idrol','users.imagen','rols.nombre as rol')
          ->where('users.name','LIKE','%'.$sql.'%')
          ->orwhere('users.num_documento','LIKE','%'.$sql.'%')
          ->orderBy('users.id','desc')
          ->paginate(8);

           /*listar los roles en ventana modal
          $rols=FacadesDB::table('rols')
          ->select('id','nombre','descripcion')
          ->get(); */

          return view('user.index',["usuarios"=>$usuarios,"buscarTexto"=>$sql]);
          //return $usuarios;
      }
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //listar roles en un select
      $rols=FacadesDB::table('rols')
      ->select('id','nombre','descripcion')
      ->get();
      return view('user.agregar', compact('rols'));
  }
  public function store(Request $request)
  {
      $this->validate(request(),[
        'name' => 'required',
        'email'=> 'required|email',
        'password' => 'required|confirmed',
      ]);
      //if(!$request->ajax()) return redirect('/');
      $user= new User();
      $user->name = $request->name;
      $user->tipo_documento = $request->tipo_documento;
      $user->num_documento = $request->num_documento;
      $user->telefono = $request->telefono;
      $user->email = $request->email;
      $user->direccion = $request->direccion;
      $user->password =  $request->password;

      $user->idrol = $request->id_rol;

          //inicio registrar imagen
          //Handle File Upload
          if($request->hasFile('imagen')){

              //Get filename with the extension
              $filenamewithExt = $request->file('imagen')->getClientOriginalName();

              //Get just filename
              $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

              //Get just ext
              $extension = $request->file('imagen')->guessClientExtension();

              //FileName to store
              $fileNameToStore = time().'.'.$extension;

              //Upload Image
              $path = $request->file('imagen')->storeAs('public/img/usuario',$fileNameToStore);


          } else{

              $fileNameToStore="noimagen.jpg";
          }

         $user->imagen=$fileNameToStore;
          /*if($request->hasFile('imagen')){

              $user->imagen=$request->file('imagen')->store('uploads','public');
          } else{

              $user->imagen="noimagen.png";
          }
          */


          //fin registrar imagen
          $user->save();
          return Redirect::to("user");
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $user=User::findOrFail($id);

      $rols=FacadesDB::table('rols')
      ->select('id','nombre','descripcion')
      ->get();
      return view('user.editar', compact('user','rols'));
  }
  public function update(Request $request,$id)
  {
      /*
      $datosusuario = request()->except(['_token','_method']);
      User::where('id','=',$id)->update($datosusuario);
      return redirect('producto');*/

      $user= User::findOrFail($id);
      $user->name = $request->name;
      $user->tipo_documento = $request->tipo_documento;
      $user->num_documento = $request->num_documento;
      $user->telefono = $request->telefono;
      $user->email = $request->email;
      $user->direccion = $request->direccion;
      
      $user->password = $request->password;

      $user->idrol = $request->id_rol;

         //Editar imagen

         if($request->hasFile('imagen')){

                  /*si la imagen que subes es distinta a la que está por defecto
                  entonces eliminaría la imagen anterior, eso es para evitar
                  acumular imagenes en el servidor*/
              if($user->imagen != 'noimagen.png'){
                  Storage::delete('public/img/usuario/'.$user->imagen);
              }


                  //Get filename with the extension
              $filenamewithExt = $request->file('imagen')->getClientOriginalName();

              //Get just filename
              $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

              //Get just ext
              $extension = $request->file('imagen')->guessClientExtension();

              //FileName to store
              $fileNameToStore = time().'.'.$extension;

              //Upload Image
              $path = $request->file('imagen')->storeAs('public/img/usuario',$fileNameToStore);



          } else {

              $fileNameToStore = $user->imagen;
          }

             $user->imagen=$fileNameToStore;


       //fin editar imagen

        $user->save();
        return Redirect::to("user");
  }


  public function destroy($id)
  {
      User::destroy($id);
      return redirect('user');
  }
}

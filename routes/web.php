<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal');
})->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
  Route::group(['middleware' => ['Vendedor']], function(){
    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('venta', VentaController::class);
    Route::get('/pdfVenta/{id}', [VentaController::class, 'pdf'])->name('pdfVenta.pdf');
  });

  Route::group(['middleware' => ['Administrador']], function(){
    Route::resource('categoria', CategoriaController::class)->middleware('auth');
    Route::resource('producto', ProductoController::class)->middleware('auth');
    Route::resource('cliente', ClienteController::class)->middleware('auth');
    Route::resource('venta', VentaController::class)->middleware('auth');
    Route::resource('rol', RolController::class)->middleware('auth');
    Route::resource('user', UserController::class)->middleware('auth');
    Route::get('/pdfVenta/{id}', [VentaController::class, 'pdf'])->name('pdfVenta.pdf');
  });
});
//start rutas de curso
/*
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('cliente', ClienteController::class)->middleware('auth');
Route::resource('rol', RolController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
*/
//end rutas de curso

Route::get('/register', [RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])
->middleware('guest')
->name('register.store');

Route::get('/login', [SessionController::class, 'create'])
->middleware('guest')
->name('login.index');
Route::post('/login', [SessionController::class, 'store'])
->middleware('guest')
->name('login.store');

Route::get('/logout', [SessionController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

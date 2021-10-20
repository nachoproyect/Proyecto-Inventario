<?php
//use App\Http\Controllers\BarcodeGeneratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;

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
    return view('auth.login');
});

 Route::get( 'imprimir' , [ArticuloController::class, 'barra'])->name('articulo.imprimirBarra');
 Route::get('/articulo/pdf', [ArticuloController::class, 'createPDF'])->name('articulo.pdf');

 Route::get( 'impresion' , [ArticuloController::class, 'impresion'])->name('articulo.impresion');



Route::resource('categorias','App\Http\Controllers\CategoriaController');
Route::resource('sectors','App\Http\Controllers\SectorController');
Route::resource('sedes','App\Http\Controllers\SedeController');
Route::resource('articulos','App\Http\Controllers\ArticuloController');
//Route::resource('set_articulos','App\Http\Controllers\SetArticuloController');
//Route::resource('articulo_set_articulo','App\Http\Controllers\Articulo_Set_ArticuloController');
Route::resource('users','App\Http\Controllers\UserController');
Route::resource('marcas','App\Http\Controllers\MarcaController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
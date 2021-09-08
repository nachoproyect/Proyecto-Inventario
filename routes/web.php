<?php
//use App\Http\Controllers\BarcodeGeneratorController;
use Illuminate\Support\Facades\Route;

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

//Route::get( 'código de barras' , [ BarcodeGeneratorController :: clase, 'índice']) -> nombre ( 'código de barras' ) ;
Route::resource('categorias','App\Http\Controllers\CategoriaController');
Route::resource('sectors','App\Http\Controllers\SectorController');
Route::resource('sedes','App\Http\Controllers\SedeController');
Route::resource('articulos','App\Http\Controllers\ArticuloController');
Route::resource('users','App\Http\Controllers\UserController');
Route::resource('marcas','App\Http\Controllers\MarcaController');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'App\Http\Controllers\User\UserController@login');
Route::post('/register', 'App\Http\Controllers\User\UserController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('template', 'App\Http\Controllers\Modello\ModelloController@get');
Route::get('categorias-subcategorias', 'App\Http\Controllers\Categoria\CategoriaController@listCategoriesAndSubcategories');
Route::get('verificar-categoria/{ruta}', 'App\Http\Controllers\Categoria\CategoriaController@verifyRouteCategory');
Route::get('verificar-subcategoria/{ruta}', 'App\Http\Controllers\Categoria\CategoriaController@verifyRouteSubcategory');
Route::get('slider', 'App\Http\Controllers\Cursore\CursoreController@list');
Route::post('curso', 'App\Http\Controllers\Cursore\CursoreController@store')->middleware('auth:api');
Route::get('products', 'App\Http\Controllers\Prodotto\ProdottoController@list')->middleware('auth:api');
Route::get('verificar-producto/{ruta}', 'App\Http\Controllers\Prodotto\ProdottoController@verifyRoute');
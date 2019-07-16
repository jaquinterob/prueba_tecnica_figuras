<?php
use App\figuras_geometricas;
use App\subtipos_figuras;
use App\tipos_figuras;


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
    $figuras = figuras_geometricas::all();
    return view('figuras.index',compact('figuras'));
});

Route::post('/figuras/getRequest',function(){
    if(Request::ajax()){
        $variables = Request::all();
        $subtipos_filtados=subtipos_figuras::where('tipo','=',$variables['tipo'])->get();
        return $subtipos_filtados;
    }
});

Route::post('/figuras/calcular_numero_lados',function(){
    if(Request::ajax()){
        $variables = Request::all();
        $subtipos_filtados=tipos_figuras::where('nombre','=',$variables['nombre_tipo'])->get();
        return $subtipos_filtados;
    }
});

Route::post('/figuras//getRequest',function(){
    if(Request::ajax()){
        $variables = Request::all();
        $subtipos_filtados=subtipos_figuras::where('tipo','=',$variables['tipo'])->get();
        return $subtipos_filtados;
    }
});

Route::post('/figuras//calcular_numero_lados',function(){
    if(Request::ajax()){
        $variables = Request::all();
        $subtipos_filtados=tipos_figuras::where('nombre','=',$variables['nombre_tipo'])->get();
        return $subtipos_filtados;
    }
});

Route::resource('tipos','TiposFigurasController');
Route::resource('subtipos','SubtiposFigurasController');
Route::resource('figuras','FigurasGeometricasController');

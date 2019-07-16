<?php

namespace App\Http\Controllers;

use App\figuras_geometricas;
use App\tipos_figuras;
use Illuminate\Http\Request;
use Session;

class FigurasGeometricasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $figuras = figuras_geometricas::all();
        return view('figuras.index',compact('figuras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=tipos_figuras::all();
        return view('figuras.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datos = $request->all();
        if ($datos['tipo']=="Triángulo" && $datos['subtipo']=="Equilátero") {
           if ($datos['lado1'] == $datos['lado2'] && $datos['lado2'] == $datos['lado3']) {
                $datos=$request->except('_token','lado1','lado2','lado3','lado4');
                if(figuras_geometricas::forceCreate($datos)){
                    Session::flash('message','Se ha creado la nueva figura geométrica satisfactoriamente');
                }else{
                    Session::flash('message_negativo','No se pudo crear el tipo');
                }
           } else {
                Session::flash('message_negativo','No era un triangulo equilátero, NO SE GUARDÓ');
           }
        } 
        return redirect()->route('figuras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\figuras_geometricas  $figuras_geometricas
     * @return \Illuminate\Http\Response
     */
    public function show(figuras_geometricas $figuras_geometricas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\figuras_geometricas  $figuras_geometricas
     * @return \Illuminate\Http\Response
     */
    public function edit(figuras_geometricas $figura)
    {
        $tipos = tipos_figuras::all();
        return view('figuras.edit',compact('figura','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\figuras_geometricas  $figuras_geometricas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos_tipo=$request->except(['_token','_method','lado1','lado2','lado3','lado4']);

        if(figuras_geometricas::where('id','=',$id)->update($datos_tipo)){
            Session::flash('message','Se ha actualiazado la figura satisfactoriamente');
        }else{
            Session::flash('message','No se pudo actualizar la figura');
        }
        return redirect()->route('figuras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\figuras_geometricas  $figuras_geometricas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (figuras_geometricas::destroy($id)) {
            Session::flash('message','Se ha eliminado la figura geométrica satisfactoriamente');
        }else{
            Session::flash('message_negativo','No se p uedo eliminar la figura geométrica');
        }
        return redirect()->route('figuras.index');
    }
}

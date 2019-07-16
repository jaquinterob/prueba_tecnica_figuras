<?php

namespace App\Http\Controllers;

use App\tipos_figuras;
use App\subtipos_figuras;
use Illuminate\Http\Request;
use Session;

class TiposFigurasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipos_figuras::all();
        return view('tipos.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos=$request->except('_token');
        
        if(tipos_figuras::forceCreate($request->except('_token'))){
            Session::flash('message','Se ha creado el tipo satisfactoriamente');
        }else{
            Session::flash('message','No se pudo crear el tipo');
        }
        //tipos_figuras::create($request->all());
        return redirect()->route('tipos.index');
       // return redirect()->route('tipos.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipos_figuras  $tipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function show(tipos_figuras $tipos_figuras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipos_figuras  $tipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function edit(tipos_figuras $tipo)
    {
        
      return view('tipos.edit',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipos_figuras  $tipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos_tipo=$request->except(['_token','_method']);

        if(tipos_figuras::where('id','=',$id)->update($datos_tipo)){
            Session::flash('message','Se ha actualiazado el tipo satisfactoriamente');
        }else{
            Session::flash('message','No se pudo actualizar el tipo');
        }
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipos_figuras  $tipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (tipos_figuras::destroy($id)) {
            Session::flash('message','Se ha eliminado el tipo satisfactoriamente');
        }else{
            Session::flash('message','No se p uedo eliminar el tipo');
        }
        return redirect()->route('tipos.index');
    }
}

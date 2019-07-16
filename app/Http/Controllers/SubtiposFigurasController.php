<?php

namespace App\Http\Controllers;

use App\subtipos_figuras;
use App\tipos_figuras;
use Illuminate\Http\Request;
use Session;

class SubtiposFigurasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtipos = subtipos_figuras::all();
        return view('subtipos.index',compact('subtipos','tipos_figura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = tipos_figuras::all();
        return view('subtipos.create',compact('tipos'));
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
        
        if(subtipos_figuras::forceCreate($request->except('_token'))){
            Session::flash('message','Se ha creado el subtipo satisfactoriamente');
        }else{
            Session::flash('message_negativo','No se pudo crear el subtipo');
        }
        //tipos_figuras::create($request->all());
        return redirect()->route('subtipos.index');
       // return redirect()->route('tipos.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subtipos_figuras  $subtipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function show(subtipos_figuras $subtipos_figuras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subtipos_figuras  $subtipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function edit(subtipos_figuras $subtipo)
    {
        $tipos = tipos_figuras::all();
        return view('subtipos.edit',compact('subtipo'),compact('tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subtipos_figuras  $subtipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos_subtipo=$request->except(['_token','_method']);

        if(subtipos_figuras::where('id','=',$id)->update($datos_subtipo)){
            Session::flash('message','Se ha actualiazado el subtipo satisfactoriamente');
        }else{
            Session::flash('message_negativo','No se pudo actualizar el subtipo');
        }
        return redirect()->route('subtipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subtipos_figuras  $subtipos_figuras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (subtipos_figuras::destroy($id)) {
            Session::flash('message','Se ha eliminado el subtipo satisfactoriamente');
        }else{
            Session::flash('message_negativo','No se pudo eliminar el subtipo');
        }
        return redirect()->route('subtipos.index');
    }
}

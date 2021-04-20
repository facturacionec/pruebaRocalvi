<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_estado = estado::latest()->whereNotNull('estado_me_id')->paginate(5);
        return view("estados.index",compact("list_estado"))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_estado = Estado::all()->WhereNotNull('estado_me_id');
        return view("estados.create",compact("list_estado"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estado;
        $estado->fill( $request->all() );
        $estado->save();
        return redirect()->route('estados.index')
        ->with('success', 'Estado creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        return view("estados.show",compact("estado"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        $list_estado = Estado::all()->WhereNotNull('estado_me_id');
        return view("estados.edit",compact("estado","list_estado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        $estado->fill( $request->all() );
        $estado->save();
        return redirect()->route('estados.index')
        ->with('success', 'Estado actualizado exitosamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->estado_me_id = null;
        $estado->save();
        
        return redirect()->route('estados.index')
        ->with('success', 'Estado eliminado exitosamente');
    } 

}

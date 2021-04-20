<?php

namespace App\Http\Controllers;

use App\Cargo as cargo;
use App\Compania as compania; 
use App\Estado;
use Illuminate\Http\Request;

class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $list_compania = compania::latest()->whereNotNull('estado_id')->paginate(5);
        return view("compania.index",compact("list_compania"))
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
        return view("compania.create",compact("list_estado"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compania = new compania;
        $compania->fill( $request->all() );
        $compania->save();
        return redirect()->route('empresas.index')
        ->with('success', 'Compañia creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function show(compania $compania, $id)
    {
        $compania = compania::findOrFail($id); 
        return view("compania.show",compact("compania"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function edit(compania $compania, $id)
    {
        
        $compania = compania::findOrFail($id); 
        $list_estado = Estado::all()->WhereNotNull('estado_me_id');
        return view("compania.edit",compact("compania","list_estado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compania $compania)
    {
        $compania->fill( $request->all() );
        $compania->save();
        return redirect()->route('empresas.index')
        ->with('success', 'Empresa actualizado exitosamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function destroy(compania $compania, $id)
    {
        $compania = compania::findOrFail($id); 
        $compania->estado_id = null;
        $compania->save();
        
        return redirect()->route('empresas.index')
        ->with('success', 'Empresa eliminado exitosamente');
    }
}

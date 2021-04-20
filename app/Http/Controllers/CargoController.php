<?php

namespace App\Http\Controllers;

use App\Cargo as cargo;
use App\Estado;
use App\Http\Requests\CargoStoreRequest;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_cargo = cargo::latest()->whereNotNull('estado_id')->paginate(5);
        return view("cargo.index",compact("list_cargo"))
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

        $menu_activate = __FUNCTION__;
        return view("cargo.create",compact("list_estado","menu_activate"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoStoreRequest $request)
    {
        $cargo = new cargo;
        $cargo->fill( $request->all() ); 
        $cargo->save();
        return redirect()->route('cargos.index')
        ->with('success', 'Cargo creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(cargo $cargo)
    {
        return view("cargo.show",compact("cargo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(cargo $cargo)
    {
        $list_estado = Estado::all()->WhereNotNull('estado_me_id');
        return view("cargo.edit",compact("cargo","list_estado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(CargoStoreRequest $request, cargo $cargo)
    { 
        $cargo->fill( $request->all() );
        $cargo->save();
        return redirect()->route('cargos.index')
        ->with('success', 'Cargo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(cargo $cargo)
    {
        $cargo->estado_id = null;
        $cargo->save();
        
        return redirect()->route('cargos.index')
        ->with('success', 'Cargo eliminado exitosamente');
    }
}

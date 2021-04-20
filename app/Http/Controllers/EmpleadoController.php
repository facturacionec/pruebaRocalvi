<?php

namespace App\Http\Controllers;

use App\Cargo as cargo;
use App\Compania as compania;
use App\Empleado;
use App\Estado;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_empleado = Empleado::latest()->whereNotNull('estado_id')->paginate(5);
        return view("empleado.index",compact("list_empleado"))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_cargo = cargo::all()->WhereNotNull('estado_id');
        $list_compania = compania::all()->WhereNotNull('estado_id');
        $list_estado = Estado::all()->WhereNotNull('estado_me_id');
        return view("empleado.create",compact("list_cargo","list_compania","list_estado"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $empleado = new Empleado;
        $empleado->fill( $request->all() );
        $empleado->save();
        return redirect()->route('empleados.index')
        ->with('success', 'Empleado creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view("empleado.show",compact("empleado"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $list_cargo = cargo::all()->WhereNotNull('estado_id');
        $list_compania = compania::all()->WhereNotNull('estado_id');
        $list_estado = Estado::all()->WhereNotNull('estado_me_id');
        return view("empleado.edit",compact("empleado","list_cargo","list_compania","list_estado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->fill( $request->all() );
        $empleado->save();
        return redirect()->route('empleados.index')
        ->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->estado_id = null;
        $empleado->save();
        
        return redirect()->route('empleados.index')
        ->with('success', 'Empleado eliminado exitosamente');
    }
}

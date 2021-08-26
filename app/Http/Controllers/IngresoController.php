<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::all();

        return view('ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingresos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NumRecibo' =>'required',
            'Tipo' => 'required',
            'idCliente' => 'required',
            'idPersonal' => 'required',
        ]);

        $ingreso = Ingreso::create($request->all());

        return redirect()->route('ingresos.index', $ingreso)->with('info', 'Se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        return view('ingresos.show', compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        return view('ingresos.edit', compact('ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ingreso $ingreso)
    {
        $request->validate([
            'NumRecibo' =>'required',
            'Tipo' => 'required',
            'idCliente' => 'required',
            'idPersonal' => 'required',
        ]);

        $ingreso->update($request->all());

        return redirect()->route('ingresos.index', $ingreso)->with('info', 'Se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();

        return redirect()->route('ingresos.index', $ingreso)->with('danger', 'Se eliminó correctamente');
    }
}

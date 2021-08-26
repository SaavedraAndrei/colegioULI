<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egreso;


class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egresos = Egreso::all();

        return view('egresos.index', compact('egresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('egresos.create');
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
            'idTrabajador' => 'required',
            'idPersonal' => 'required',
        ]);

        $egreso = Egreso::create($request->all());

        return redirect()->route('egresos.index', $egreso)->with('info', 'Se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Egreso $egreso)
    {
        return view('egresos.show', compact('egreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Egreso $egreso)
    {
        return view('egresos.edit', compact('egreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Egreso $egreso)
    {
        $request->validate([
            'NumRecibo' =>'required',
            'Tipo' => 'required',
            'idTrabajador' => 'required',
            'idPersonal' => 'required',
        ]);

        $egreso->update($request->all());

        return redirect()->route('egresos.index', $egreso)->with('info', 'Se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egreso $egreso)
    {
        $egreso->delete();

        return redirect()->route('egresos.index', $egreso)->with('danger', 'Se eliminó correctamente');
    }
}

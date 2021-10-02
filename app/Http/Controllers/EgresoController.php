<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;



class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    

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
    public function store(Request $request, Egreso $egreso)
    {
        $request->validate([
            'NumRecibo' => ['required','unique:egresos'],
            'dniPersonal' => 'required',
            'pago' => 'required',
        ]);

        $egreso = Egreso::create([
            'NumRecibo' => $request->NumRecibo,
            'dniPersonal' => $request->dniPersonal,
            'pago' => $request->pago,
            'idPersonal' => Auth::user()->id,
        ]);

        $pago_alumno = $request->pago;
        $dni_alumno = $request->dniPersonal;
        
        $montoActuals = DB::table('Personals')->select('montoPagado')->where('dni', $dni_alumno)->get();
        
        foreach ($montoActuals as $montoActual) {
            $monto = $montoActual->montoPagado;

            $montoFinal = $monto + $pago_alumno;

            Personal::where('dni', '=', $dni_alumno)->update(['montoPagado' => $montoFinal]);
        }

        // 2021-09-08 20:16:57
        // 2021-09-08 20:18:41

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

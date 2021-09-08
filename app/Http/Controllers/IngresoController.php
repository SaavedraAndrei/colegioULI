<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ingresos = DB::table('Ingresos')
            ->leftjoin('Alumnos', 'Ingresos.idAlumno', '=', 'Alumnos.id')
            ->select(
                'Ingresos.id as id', 
                'Ingresos.NumRecibo as NumRecibo',
                'Alumnos.dni as dni',
                'Ingresos.Tipo as Tipo',
                'Ingresos.created_at as created_at',
                'Ingresos.pago as pago',
                'Ingresos.idPersonal'
            )
            ->get();

        return view('ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = [
            'pension' => 'Pension de enseñanza',
            'matricula' => 'Matrícula',
            'laboratorio' => 'Laboratorio',
            'certificado' => 'Certificado',
            'constancia' => 'Constancia',
            'trasladoExterno' => 'Traslado Externo',
            'etas' => 'ETAS',
            'libretaNotas' => 'Libreta de Notas',
            'tarjetaControl' => 'Tarjeta de Control',
            'fut' => 'F.U.T',
            'matEducativo' => 'Material Educativo',
            'capacitacion' => 'Capacitación',
            'examen' => 'Examen',
            'otros' => 'Otros',
        ];

        return view('ingresos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Alumno $alumno)
    {
        $request->validate([
            'NumRecibo' => ['required','unique:ingresos'],
            'Tipo' => 'required',
            'idAlumno' => 'required',
            'pago' => 'required',
        ]);

        $ingreso = Ingreso::create([
            'NumRecibo' => $request->NumRecibo,
            'Tipo' => $request->Tipo,
            'idAlumno' => $request->idAlumno,
            'pago' => $request->pago,
            'idPersonal' => Auth::user()->id,
        ]);

        // $pago_alumno = $request->pago;
        // $id_alumno = $request->idAlumno;
        
        // $montoActuals = DB::table('ingresos')->select('pago')->where('id', $id_alumno)->get();
        
        // foreach ($montoActuals as $montoActual) {
        //     $monto = $montoActual->pago;

        //     $montoFinal = $monto + $pago_alumno;

        //     // Alumno::update([
        //     //     'montoPagado' => $montoFinal
        //     // ]);

        //     DB::table('Alumnos')->update('montoPagado', $montoFinal)->where('id', $id_alumno);
        // }

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

        $tipos = [
            'pension' => 'Pensión de enseñanza',
            'matricula' => 'Matrícula',
            'laboratorio' => 'Laboratorio',
            'certificado' => 'Certificado',
            'constancia' => 'Constancia',
            'trasladoExterno' => 'Traslado Externo',
            'etas' => 'ETAS',
            'libretaNotas' => 'Libreta de Notas',
            'tarjetaControl' => 'Tarjeta de Control',
            'fut' => 'F.U.T',
            'matEducativo' => 'Material Educativo',
            'capacitacion' => 'Capacitación',
            'examen' => 'Examen',
            'otros' => 'Otros',
        ];

        return view('ingresos.edit', compact('ingreso', 'tipos'));
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

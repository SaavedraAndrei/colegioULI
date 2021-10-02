<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public function index()
    {

        $paginationTheme = "bootstrap";

        $ingresos = DB::table('Ingresos')
            ->leftjoin('Alumnos', 'Ingresos.dniAlumno', '=', 'Alumnos.dni')
            ->select(
                'Ingresos.id as id', 
                'Ingresos.NumRecibo as NumRecibo',
                'Alumnos.dni as dni',
                'Ingresos.Tipo as Tipo',
                'Ingresos.created_at as created_at',
                'Ingresos.pago as pago',
                'Ingresos.idPersonal'
            )
            ->orderBy('created_at', 'desc')
            ->paginate();

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
            'dniAlumno' => 'required',
            'pago' => 'required',
        ]);

        $ingreso = Ingreso::create([
            'NumRecibo' => $request->NumRecibo,
            'Tipo' => $request->Tipo,
            'dniAlumno' => $request->dniAlumno,
            'pago' => $request->pago,
            'idPersonal' => Auth::user()->id,
        ]);

        $pago_alumno = $request->pago;
        $dni_alumno = $request->dniAlumno;
        
        $montoActuals = DB::table('Alumnos')->select('montoPagado')->where('dni', $dni_alumno)->get();
        
        foreach ($montoActuals as $montoActual) {
            $monto = $montoActual->montoPagado;

            $montoFinal = $monto + $pago_alumno;

            Alumno::where('dni', '=', $dni_alumno)->update(['montoPagado' => $montoFinal]);
        }

        // 2021-09-08 20:16:57
        // 2021-09-08 20:18:41

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
            'dniAlumno' => 'required',
            'pago' => 'required',
        ]);

        $ingreso->update($request->all());

        $ingreso = Ingreso::update([
            'NumRecibo' => $request->NumRecibo,
            'Tipo' => $request->Tipo,
            'dniAlumno' => $request->dniAlumno,
            'pago' => $request->pago,
        ]);

        $pago_alumno = $request->pago;
        $dni_alumno = $request->dniAlumno;
        
        $montoActuals = DB::table('Alumnos')->select('montoPagado')->where('dni', $dni_alumno)->get();
        
        foreach ($montoActuals as $montoActual) {
            $monto = $montoActual->montoPagado;

            $montoFinal = $monto + $pago_alumno;

            Alumno::where('dni', '=', $dni_alumno)->update(['montoPagado' => $montoFinal]);
        }

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

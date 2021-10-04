<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ingreso;
use App\Models\Egreso;




class ConsultaController extends Controller
{
    public function index()
    {
        // $ingresos = DB::table('Ingresos')
        //     ->select(
        //         'Ingresos.pago as pago',
        //     )
        //     ->get();

        // $ingresos = Ingreso::sum('pago');
        $ingresos = Ingreso::sum('pago');
        $egresos = Egreso::sum('pago');




        return view('consultas', compact('ingresos', 'egresos'));
        // return view('consultas', compact('ingresos'));

    }

    public function all()
    {
        // GRAFICA PARA INGRESOS Y EGRESOS 

        // $ingresos = DB::table('Ingresos')
        //     ->leftjoin('Alumnos', 'Ingresos.dniAlumno', '=', 'Alumnos.dni')
        //     ->select(
        //         'Ingresos.id as id', 
        //         'Ingresos.NumRecibo as NumRecibo',
        //         'Alumnos.dni as dni',
        //         'Ingresos.Tipo as Tipo',
        //         'Ingresos.created_at as created_at',
        //         'Ingresos.pago as pago',
        //         'Ingresos.idPersonal'
        //     )
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        $ingresos = Ingreso::sum('pago');
        $egresos = Egreso::sum('pago');

        $resultados = [$ingresos, $egresos];

        return response(json_encode($resultados), 200)->header('Content-type', 'text/plain');
    }

    public function all1()
    {
        // GRAFICA PARA PAGOS DE NIVEL SECUNDARIA POR SECCIONES

        $resultados1 = DB::table('Ingresos')
        ->leftJoin('Alumnos','Alumnos.dni','=','Ingresos.dniAlumno')
        ->where('Alumnos.nivel','secundaria')
        ->select('Alumnos.seccion',DB::raw('SUM(Ingresos.pago) AS MontoTotal' ))
        ->groupBy('Alumnos.seccion')
        ->get();

        
        return response(json_encode($resultados1), 200)->header('Content-type', 'text/plain');
        
    }
}

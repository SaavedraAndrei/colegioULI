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

        $gananciabruta = $ingresos - $egresos;
        
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

    public function all6()
    {
       $resultados6 = DB::table('Ingresos')
        ->select(DB::raw('MONTH(created_at) AS Mes'),DB::raw('SUM(pago) AS MontoTotal'))
        ->groupBy('Mes')
        ->get();
        return response(json_encode($resultados6), 200)->header('Content-type', 'text/plain');
    }

    public function all7()
    {
       $resultados7 = DB::table('Egresos')
        ->select(DB::raw('MONTH(created_at) AS Mes'),DB::raw('SUM(pago) AS MontoTotal'))
        ->groupBy('Mes')
        ->get();
        
        return response(json_encode($resultados7), 200)->header('Content-type', 'text/plain');
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
        // enviar mediante json las gr??ficos en estado de arrays
        // si envias en formato de arrray toma el formato JSON
        // para esto tendr??s que entrar doblemente al array a trav??s de sus 
        // ??ndices [0][0]
        
        return response(json_encode($resultados1), 200)->header('Content-type', 'text/plain');
    }

    public function all3()
    {
        // GRAFICA DE EGRESOS POR TIPO DE PERSONAL
        $resultados3 = DB::table('Egresos')
        ->leftJoin('Personals','Personals.dni','=','Egresos.dniPersonal')
        ->select('Personals.Tipo',DB::raw('SUM(Egresos.pago) AS MontoTotal'))
        ->groupBy('Personals.Tipo')
        ->get();
        return response(json_encode($resultados3), 200)->header('Content-type', 'text/plain');
    }

    public function all4()
    {
        // GRAFICA DE INGRESOS POR SECCION Y NIVEL PRIMARIA
        $resultados4 = DB::table('Ingresos')
        ->leftJoin('Alumnos','Alumnos.dni','=','Ingresos.dniAlumno')
        ->where('Alumnos.nivel','primaria')
        ->select('Alumnos.seccion',DB::raw('SUM(Ingresos.pago) AS MontoTotal' ))
        ->groupBy('Alumnos.seccion')
        ->get();
        return response(json_encode($resultados4), 200)->header('Content-type', 'text/plain');
    }

    public function all5()
    {
        // GRAFICA DE INGRESOS POR SECCION Y NIVEL INICIAL
        $resultados5 = DB::table('Ingresos')
        ->leftJoin('Alumnos','Alumnos.dni','=','Ingresos.dniAlumno')
        ->where('Alumnos.nivel','inicial')
        ->select('Alumnos.seccion',DB::raw('SUM(Ingresos.pago) AS MontoTotal' ))
        ->groupBy('Alumnos.seccion')
        ->get();
        return response(json_encode($resultados5), 200)->header('Content-type', 'text/plain');
    }
}

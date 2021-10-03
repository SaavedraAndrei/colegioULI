<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ConsultaController extends Controller
{
    public function index()
    {
        return view('consultas');
    }

    public function all()
    {
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
            ->get();


        return response(json_encode($ingresos), 200)->header('Content-type', 'text/plain');
    }
}

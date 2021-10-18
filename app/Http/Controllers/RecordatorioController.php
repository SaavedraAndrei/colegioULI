<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\RecordatorioExport1;
use App\Exports\RecordatorioExport2;
use App\Exports\RecordatorioExport3;
use App\Exports\RecordatorioExport4;
use Maatwebsite\Excel\Facades\Excel;

class RecordatorioController extends Controller
{
    public function index1()
    {
        $resultados1 = DB::table('Alumnos')
        ->where('b1','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','nivel','seccion','celular','b1')
        ->get();

        return view('recordatorio1', compact('resultados1'));
    }

    public function export1()
    {
        return Excel::download(new RecordatorioExport1, 'recordatorio-B1.xlsx');
    }

    public function index2()
    {
        $resultados2 = DB::table('Alumnos')
        ->where('b2','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','nivel','seccion','celular','b2')
        ->get();

        return view('recordatorio2', compact('resultados2'));
    }

    public function export2()
    {
        return Excel::download(new RecordatorioExport2, 'recordatorio-B2.xlsx');
    }

    public function index3()
    {
        $resultados3 = DB::table('Alumnos')
        ->where('b3','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','nivel','seccion','celular','b3')
        ->get();

        return view('recordatorio3', compact('resultados3'));
    }

    public function export3()
    {
        return Excel::download(new RecordatorioExport3, 'recordatorio-B3.xlsx');
    }

    public function index4()
    {
        $resultados4 = DB::table('Alumnos')
        ->where('b4','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','nivel','seccion','celular','b4')
        ->get();

        return view('recordatorio4', compact('resultados4'));
    }

    public function export4()
    {
        return Excel::download(new RecordatorioExport4, 'recordatorio-B4.xlsx');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\RecordatorioExport1;
use App\Exports\RecordatorioExport2;
use App\Exports\RecordatorioExport3;
use App\Exports\RecordatorioExport4;
use App\Exports\RecordatorioExport5;
use App\Exports\RecordatorioExport6;
use App\Exports\RecordatorioExport7;
use App\Exports\RecordatorioExport8;
use App\Exports\RecordatorioExport9;
use App\Exports\RecordatorioExport10;

use Maatwebsite\Excel\Facades\Excel;

class RecordatorioController extends Controller
{
    public function index1()
    {
        $resultados1 = DB::table('Alumnos')
        ->where('p1','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p1')
        ->get();

        return view('recordatorio1', compact('resultados1'));
    }

    public function export1()
    {
        return Excel::download(new RecordatorioExport1, 'recordatorio-P1.xlsx');
    }

    public function index2()
    {
        $resultados2 = DB::table('Alumnos')
        ->where('p2','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p2')
        ->get();

        return view('recordatorio2', compact('resultados2'));
    }

    public function export2()
    {
        return Excel::download(new RecordatorioExport2, 'recordatorio-P2.xlsx');
    }

    public function index3()
    {
        $resultados3 = DB::table('Alumnos')
        ->where('p3','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p3')
        ->get();

        return view('recordatorio3', compact('resultados3'));
    }

    public function export3()
    {
        return Excel::download(new RecordatorioExport3, 'recordatorio-P3.xlsx');
    }

    public function index4()
    {
        $resultados4 = DB::table('Alumnos')
        ->where('p4','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p4')
        ->get();

        return view('recordatorio4', compact('resultados4'));
    }

    public function export4()
    {
        return Excel::download(new RecordatorioExport4, 'recordatorio-P4.xlsx');
    }

    public function index5()
    {
        $resultados5 = DB::table('Alumnos')
        ->where('p5','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p5')
        ->get();

        return view('recordatorio5', compact('resultados5'));
    }

    public function export5()
    {
        return Excel::download(new RecordatorioExport5, 'recordatorio-P5.xlsx');
    }

    public function index6()
    {
        $resultados6 = DB::table('Alumnos')
        ->where('p6','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p6')
        ->get();

        return view('recordatorio6', compact('resultados6'));
    }

    public function export6()
    {
        return Excel::download(new RecordatorioExport6, 'recordatorio-P6.xlsx');
    }

    public function index7()
    {
        $resultados7 = DB::table('Alumnos')
        ->where('p7','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p7')
        ->get();

        return view('recordatorio7', compact('resultados7'));
    }

    public function export7()
    {
        return Excel::download(new RecordatorioExport7, 'recordatorio-P7.xlsx');
    }

    public function index8()
    {
        $resultados8 = DB::table('Alumnos')
        ->where('p8','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p8')
        ->get();

        return view('recordatorio8', compact('resultados8'));
    }

    public function export8()
    {
        return Excel::download(new RecordatorioExport8, 'recordatorio-P8.xlsx');
    }

    public function index9()
    {
        $resultados9 = DB::table('Alumnos')
        ->where('p9','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p9')
        ->get();

        return view('recordatorio9', compact('resultados9'));
    }

    public function export9()
    {
        return Excel::download(new RecordatorioExport9, 'recordatorio-P9.xlsx');
    }


    public function index10()
    {
        $resultados10 = DB::table('Alumnos')
        ->where('p10','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p10')
        ->get();

        return view('recordatorio10', compact('resultados10'));
    }

    public function export10()
    {
        return Excel::download(new RecordatorioExport10, 'recordatorio-P10.xlsx');
    }
}
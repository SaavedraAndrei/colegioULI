<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport3 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados3 = DB::table('Alumnos')
        ->where('p3','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p3')
        ->get();
        return $resultados3;
    }
}

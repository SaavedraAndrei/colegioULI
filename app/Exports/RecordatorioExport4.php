<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport4 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados4 = DB::table('Alumnos')
        ->where('p4','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p4')
        ->get();

        return $resultados4;
    }
}

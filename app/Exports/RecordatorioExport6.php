<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport6 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados6 = DB::table('Alumnos')
        ->where('p6','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p6')
        ->get();

        return $resultados6;
    }
}

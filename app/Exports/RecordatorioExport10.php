<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport10 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados10 = DB::table('Alumnos')
        ->where('p10','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p10')
        ->get();

        return $resultados10;
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport9 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados9 = DB::table('Alumnos')
        ->where('p9','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p9')
        ->get();

        return $resultados9;
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport7 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados7 = DB::table('Alumnos')
        ->where('p7','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p7')
        ->get();

        return $resultados7;
    }
}

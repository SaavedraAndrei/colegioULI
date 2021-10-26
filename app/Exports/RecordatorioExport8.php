<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport8 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados8 = DB::table('Alumnos')
        ->where('p8','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p8')
        ->get();

        return $resultados8;
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados2 = DB::table('Alumnos')
        ->where('p2','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p2')
        ->get();

        return $resultados2;
    }
}

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
        ->where('b2','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','nivel','seccion','celular','b2')
        ->get();

        return $resultados2;
    }
}

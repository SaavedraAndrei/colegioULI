<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport1 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $resultados1 = DB::table('Alumnos')
        ->where('p1','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p1')
        ->get();

        return $resultados1;
    }

}

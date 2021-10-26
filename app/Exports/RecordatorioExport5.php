<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class RecordatorioExport5 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $resultados5 = DB::table('Alumnos')
        ->where('p5','NO')
        ->select('dni','Nombres','ApellPaterno','ApellMaterno','celular','p5')
        ->get();

        return $resultados5;
    }
}

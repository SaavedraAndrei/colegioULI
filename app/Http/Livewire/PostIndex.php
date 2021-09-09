<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class PostIndex extends Component
{

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";


    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $ingresos = DB::table('Ingresos')
            ->leftjoin('Alumnos', 'Ingresos.idAlumno', '=', 'Alumnos.id')
            ->select(
                'Ingresos.id as id', 
                'Ingresos.NumRecibo as NumRecibo',
                'Alumnos.dni as dni',
                'Ingresos.Tipo as Tipo',
                'Ingresos.created_at as created_at',
                'Ingresos.pago as pago',
                'Ingresos.idPersonal'
            )
            ->where('NumRecibo', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('livewire.post-index', compact('ingresos'));
    }
}

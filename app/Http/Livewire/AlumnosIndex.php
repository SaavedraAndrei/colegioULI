<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class AlumnosIndex extends Component
{

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $alumnos = DB::table('Alumnos')
            ->select(
                'id', 
                'Nombres',
                'ApellPaterno',
                'ApellMaterno',
                'dni',
                'genero',
                'nivel',
                'seccion',
                'montoPagado'
            )
            ->where('dni', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.alumnos-index', compact('alumnos'));
    }
}

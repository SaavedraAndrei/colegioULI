<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Alumno;



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
                'estado',
                'montoPagado',
                'b1',
                'b2',
                'b3',
                'b4'
            )
            ->where('ApellPaterno', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate();


        return view('livewire.alumnos-index', compact('alumnos'));
    }
}

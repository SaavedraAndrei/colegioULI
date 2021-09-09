<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;



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
            ->leftjoin('Alumnos', 'Ingresos.dniAlumno', '=', 'Alumnos.dni')
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

        $pruebas = DB::table('users')->select('rol')->where('id', Auth::user()->id)->get();

        foreach ($pruebas as $prueba) {
            $id = $prueba->rol;
        }

        return view('livewire.post-index', compact('ingresos', 'id'));
    }
}

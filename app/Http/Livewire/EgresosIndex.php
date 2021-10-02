<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;



class EgresosIndex extends Component
{
    


    use WithPagination;
    
    protected $paginationTheme = "bootstrap";


    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $egresos = DB::table('Egresos')
            ->leftjoin('Personals', 'Egresos.dniPersonal', '=', 'Personals.dni')
            ->select(
                'Egresos.id as id', 
                'Egresos.NumRecibo as NumRecibo',
                'Personals.dni as dniPersonal',
                'Egresos.pago as pago',
                'Egresos.created_at as created_at',
                'Egresos.idPersonal'
            )
            ->where('NumRecibo', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate();

        $pruebas = DB::table('users')->select('rol')->where('id', Auth::user()->id)->get();

        foreach ($pruebas as $prueba) {
            $id = $prueba->rol;
        }

        return view('livewire.egresos-index', compact('egresos', 'id'));
    }
}

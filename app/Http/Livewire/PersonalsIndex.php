<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Personal;

class PersonalsIndex extends Component
{

    

    use WithPagination;
    
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $personals = DB::table('Personals')
            ->select(
                'id', 
                'Nombres',
                'ApellPaterno',
                'ApellMaterno',
                'dni',
                'Tipo',
                'estado',
                'montoPagado'
            )
            ->where('ApellPaterno', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('livewire.personals-index', compact('personals'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = Personal::all();

        return view('personals.index', compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = [
            'docente' => 'Docente',
            'administrativo' => 'Administrativo',
            'limpieza' => 'Limpieza',
            'otros' => 'Otros'
        ];

        return view('personals.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombres' =>'required',
            'ApellPaterno' => 'required',
            'ApellMaterno' => 'required',
            'dni' => 'required|unique:personals',
            'tipo' => 'required',
        ]);

        // $alumno = Alumno::create($request->all());
        $idNuevo = 0;
        $idActual = Personal::max('id');
        $idNuevo = $idActual + 1;
        
        $personal = Personal::create([
            'Nombres' => $request->Nombres,
            'ApellPaterno' => $request->ApellPaterno,
            'ApellMaterno' => $request->ApellMaterno,
            'dni' => $request->dni,
            'tipo' => $request->tipo,
            'estado' => 'activo',
            'id' => $idNuevo,
        ]);

        return redirect()->route('personals.index', $personal)->with('info', 'Se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('personals.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        $tipos = [
            'docente' => 'Docente',
            'administrativo' => 'Administrativo',
            'limpieza' => 'Limpieza',
            'otros' => 'Otros'
        ];

        return view('personals.edit', compact('personal','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'Nombres' =>'required',
            'ApellPaterno' => 'required',
            'ApellMaterno' => 'required',
            'dni' => 'required',
            'tipo' => 'required',
            'estado' => 'required',
            'montoPagado' => 'required'
        ]);

        $personal->update($request->all());

        return redirect()->route('personals.index', $personal)->with('info', 'Se actualizó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;



class AlumnoController extends Controller
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
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = [
            'inicial' => 'Inicial',
            'primaria' => 'Primaria',
            'secundaria' => 'Secundaria',
        ];

        $secciones = [
            'tres-inicial' => 'Tres años',
            'cuatro-inicial' => 'Cuatro años',
            'cinco-inicial' => 'Cinco años',
            'primero-A' => 'Primero-A',
            'segundo-A' => 'Segundo-A',
            'tercero-A' => 'Tercero-A',
            'cuarto-A' => 'Cuarto-A',
            'quinto-A' => 'Quinto-A',
            'sexto-A' => 'Sexto-A',
        ];

        $generos = [
            'M' => 'Masculino',
            'F' => 'Femenino',
        ];

        return view('alumnos.create', compact('generos', 'niveles', 'secciones'));
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
            'dni' => 'required|unique:alumnos',
            'genero' => 'required',
            'nivel' => 'required',
            'seccion' => 'required',
        ]);

        // $alumno = Alumno::create($request->all());
        $idNuevo = 0;
        $idActual = Alumno::max('id');
        $idNuevo = $idActual + 1;
        
        $alumno = Alumno::create([
            'Nombres' => $request->Nombres,
            'ApellPaterno' => $request->ApellPaterno,
            'ApellMaterno' => $request->ApellMaterno,
            'dni' => $request->dni,
            'genero' => $request->genero,
            'nivel' => $request->nivel,
            'seccion' => $request->seccion,
            'celular' => $request->celular,
            'estado' => 'activo',
            'id' => $idNuevo,
        ]);

        return redirect()->route('alumnos.index', $alumno)->with('info', 'Se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $aAlumno lumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        $generos = [
            'M' => 'Masculino',
            'F' => 'Femenino',
        ];

        $niveles = [
            'inicial' => 'Inicial',
            'primaria' => 'Primaria',
            'secundaria' => 'Secundaria',
        ];

        $secciones = [
            'tres-inicial' => 'Tres años',
            'cuatro-inicial' => 'Cuatro años',
            'cinco-inicial' => 'Cinco años',
            'primero-A' => 'Primero-A',
            'segundo-A' => 'Segundo-A',
            'tercero-A' => 'Tercero-A',
            'cuarto-A' => 'Cuarto-A',
            'quinto-A' => 'Quinto-A',
            'sexto-A' => 'Sexto-A',
        ];

        return view('alumnos.edit', compact('alumno', 'generos', 'niveles', 'secciones'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $aAlumno lumno
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'Nombres' =>'required',
            'ApellPaterno' => 'required',
            'ApellMaterno' => 'required',
            'dni' => 'required',
            'genero' => 'required',
            'nivel' => 'required',
            'seccion' => 'required',
            'estado' => 'required',
            'montoPagado' => 'required',
            'b1' => 'required',
            'b2' => 'required',
            'b3' => 'required',
            'b4' => 'required',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index', $alumno)->with('info', 'Se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Alumno alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        
    }
}

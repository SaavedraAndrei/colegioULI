<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $pruebas = DB::table('users')->select('rol')->where('id', Auth::user()->id)->get();

        foreach ($pruebas as $prueba) {
            $id = $prueba->rol;
        }

        return view('users.index', compact('users', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = [
            '1' => 'Administrador',
            '2' => 'Secretario',
        ];

        return view('users.create', compact('roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'rol' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);
        return redirect()->route('users.index', $user)->with('info', 'Se registró nuevo usuario correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return view('users.show', compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {

        // $tipos = [
        //     'pension' => 'Pensión de enseñanza',
        //     'matricula' => 'Matrícula',
        //     'laboratorio' => 'Laboratorio',
        //     'certificado' => 'Certificado',
        //     'constancia' => 'Constancia',
        //     'trasladoExterno' => 'Traslado Externo',
        //     'etas' => 'ETAS',
        //     'libretaNotas' => 'Libreta de Notas',
        //     'tarjetaControl' => 'Tarjeta de Control',
        //     'fut' => 'F.U.T',
        //     'matEducativo' => 'Material Educativo',
        //     'capacitacion' => 'Capacitación',
        //     'examen' => 'Examen',
        //     'otros' => 'Otros',
        // ];

        // return view('ingresos.edit', compact('ingreso', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ingreso $ingreso)
    {
        // $request->validate([
        //     'NumRecibo' =>'required',
        //     'Tipo' => 'required',
        //     'dniAlumno' => 'required',
        //     'pago' => 'required',
        // ]);

        // $ingreso->update($request->all());

        // $ingreso = Ingreso::update([
        //     'NumRecibo' => $request->NumRecibo,
        //     'Tipo' => $request->Tipo,
        //     'dniAlumno' => $request->dniAlumno,
        //     'pago' => $request->pago,
        // ]);

        // $pago_alumno = $request->pago;
        // $dni_alumno = $request->dniAlumno;
        
        // $montoActuals = DB::table('Alumnos')->select('montoPagado')->where('dni', $dni_alumno)->get();
        
        // foreach ($montoActuals as $montoActual) {
        //     $monto = $montoActual->montoPagado;

        //     $montoFinal = $monto + $pago_alumno;

        //     Alumno::where('dni', '=', $dni_alumno)->update(['montoPagado' => $montoFinal]);
        // }

        // return redirect()->route('ingresos.index', $ingreso)->with('info', 'Se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();


        return redirect()->route('users.index', $user)->with('danger', 'Se eliminó correctamente');
    }
}

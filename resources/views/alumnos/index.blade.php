@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Lista de alumnos</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger">
            <strong>{{session('danger')}}</strong>
        </div>
    @endif


    <div class="card">

        <div class="card-header">
            <a href="{{route('alumnos.create')}}" class="btn btn-primary">Registrar alumno</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>DNI</th>
                        <th>Género</th>
                        <th>Nivel</th>
                        <th>Sección</th>
                        <th>Monto Pagado</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{$alumno->id}}</td>
                            <td>{{$alumno->Nombres}}</td>
                            <td>{{$alumno->ApellPaterno}}</td>
                            <td>{{$alumno->ApellMaterno}}</td>
                            <td>{{$alumno->dni}}</td>
                            <td>{{$alumno->genero}}</td>
                            <td>{{$alumno->nivel}}</td>
                            <td>{{$alumno->seccion}}</td>
                            <td>{{$alumno->montoPagado}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('alumnos.edit', $alumno->id)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('alumnos.destroy', $alumno->id)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
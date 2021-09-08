@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Lista de ingresos</h1>
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
            <a href="{{route('ingresos.create')}}" class="btn btn-primary">Registrar ingreso</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Recibo</th>
                        <th>DNI Alumno</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Pago</th>
                        <th>ID Personal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ingresos as $ingreso)
                        <tr>
                            <td>{{$ingreso->id}}</td>
                            <td>{{$ingreso->NumRecibo}}</td>
                            <td>{{$ingreso->dni}}</td>
                            <td>{{$ingreso->Tipo}}</td>
                            <td>{{$ingreso->created_at}}</td>
                            <td>{{$ingreso->pago}}</td>
                            <td>{{$ingreso->idPersonal}}</td>

                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('ingresos.edit', $ingreso->id)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('ingresos.destroy', $ingreso->id)}}" method="POST">
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
@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Lista de egresos</h1>
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
            <a href="{{route('egresos.create')}}" class="btn btn-primary">Registrar egreso</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Recibo</th>
                        <th>Tipo</th>
                        <th>idTrabajador</th>
                        <th>idPersonal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($egresos as $egreso)
                        <tr>
                            <td>{{$egreso->id}}</td>
                            <td>{{$egreso->NumRecibo}}</td>
                            <td>{{$egreso->Tipo}}</td>
                            <td>{{$egreso->idTrabajador}}</td>
                            <td>{{$egreso->idPersonal}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('egresos.edit', $egreso->id)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('egresos.destroy', $egreso->id)}}" method="POST">
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
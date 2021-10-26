@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Recordatorio de Pensiones</h1>
@stop

@section('content')
    <div class="centrar">

        <div class="card">

            <div class="card-header">
                <a href="/export5" class="btn btn-primary">Exportar tabla</a>
            </div>

            <div class="card-body">

    
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Celular</th>
                            <th>P5</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($resultados5 as $resultados)
                            <tr>
                                <td>{{$resultados->dni}}</td>
                                <td>{{$resultados->Nombres}}</td>
                                <td>{{$resultados->ApellPaterno}}</td>
                                <td>{{$resultados->ApellMaterno}}</td>
                                <td>{{$resultados->celular}}</td>
                                <td>{{$resultados->p5}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Registrar un nuevo egreso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'egresos.store']) !!}

            <div class="form-group">
                {!! Form::label('NumRecibo', 'Número de recibo', ['class' => 'nombre_form']) !!}
                {!! Form::text('NumRecibo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de recibo']) !!}

                @error('NumRecibo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('Tipo', 'Tipo', ['class' => 'nombre_form']) !!}
                {!! Form::text('Tipo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('Tipo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                

            <div class="form-group">
                {!! Form::label('idTrabajador', 'Trabajador', ['class' => 'nombre_form']) !!}
                {!! Form::text('idTrabajador', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('idTrabajador')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('idPersonal', 'Personal', ['class' => 'nombre_form']) !!}
                {!! Form::text('idPersonal', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('idPersonal')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
               

            <div class="form-group">
                {!! Form::submit('Registrar egreso', ['class' => 'btn btn-primary']) !!}
            </div>
            
            {!! Form::close([]) !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
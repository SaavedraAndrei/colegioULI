@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Registrar un nuevo ingreso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'ingresos.store']) !!}

            <div class="form-group">
                {!! Form::label('NumRecibo', 'Número de recibo', ['class' => 'nombre_form']) !!}
                {!! Form::text('NumRecibo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de recibo']) !!}

                @error('NumRecibo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('Tipo', 'Tipo de Ingreso') !!}
                {!! Form::select('Tipo', $tipos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de ingreso']) !!}                

                @error('Tipo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('dniAlumno', 'DNI del Alumno', ['class' => 'nombre_form']) !!}
                {!! Form::text('dniAlumno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el DNI del alumno']) !!}

                @error('dniAlumno')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('pago', 'Monto del Pago', ['class' => 'nombre_form']) !!}
                {!! Form::text('pago', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el monto del pago']) !!}

                @error('pago')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
               

            <div class="form-group">
                {!! Form::submit('Registrar ingreso', ['class' => 'btn btn-primary']) !!}
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
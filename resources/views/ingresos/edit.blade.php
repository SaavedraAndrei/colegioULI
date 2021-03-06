@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Editar ingresos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($ingreso, ['route' => ['ingresos.update', $ingreso], 'method' => 'PUT']) !!}

            
            <div class="form-group">
                {!! Form::label('NumRecibo', 'Número de recibo', ['class' => 'nombre_form']) !!}
                {!! Form::text('NumRecibo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de recibo']) !!}

                @error('NumRecibo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('tipo', 'Tipo de Ingreso') !!}
                {!! Form::select('tipo', $tipos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de ingreso']) !!}                

                @error('tipo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                

            <div class="form-group">
                {!! Form::label('idAlumno', 'Alumno', ['class' => 'nombre_form']) !!}
                {!! Form::text('idAlumno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese al alumno']) !!}

                @error('idAlumno')
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
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Editar registros de alumno</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($alumno, ['route' => ['alumnos.update', $alumno], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('Nombres', 'Nombres', ['class' => 'nombre_form']) !!}
                {!! Form::text('Nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('Nombres')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('ApellPaterno', 'Apellido Paterno', ['class' => 'nombre_form']) !!}
                {!! Form::text('ApellPaterno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('ApellPaterno')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                

            <div class="form-group">
                {!! Form::label('ApellMaterno', 'Apellido Materno', ['class' => 'nombre_form']) !!}
                {!! Form::text('ApellMaterno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('ApellMaterno')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('dni', 'DNI', ['class' => 'nombre_form']) !!}
                {!! Form::text('dni', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el DNI del alumno']) !!}

                @error('dni')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('genero', 'Género') !!}
                {!! Form::select('genero', $generos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el género del alumno']) !!}                

                @error('genero')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('nivel', 'Nivel') !!}
                {!! Form::select('nivel', $niveles, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el nivel del alumno']) !!}                

                @error('nivel')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('seccion', 'Sección') !!}
                {!! Form::select('seccion', $secciones, null, ['class' => 'form-control', 'placeholder' => 'Seleccione la sección del alumno']) !!}                

                @error('seccion')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('montoPagado', 'Total Pagado') !!}
                {!! Form::text('montoPagado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el monto total pagado por el alumno']) !!}

                @error('montoPagado')
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
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
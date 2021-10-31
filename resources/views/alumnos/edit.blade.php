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
                {!! Form::label('celular', 'Número de celular (Agrege el código 51 al inicio de cada número de celular. Ejm 51965343214)', ['class' => 'nombre_form']) !!}
                {!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de celular del alumno']) !!}

                @error('celular')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('estado', 'Estado', ['class' => 'nombre_form']) !!}
                {!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el estado del personal']) !!}

                @error('estado')
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
                {!! Form::label('p1', 'Pensión de Marzo', ['class' => 'nombre_form']) !!}
                {!! Form::text('p1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p1')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p2', 'Pensión de Abril', ['class' => 'nombre_form']) !!}
                {!! Form::text('p2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p2')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p3', 'Pensión de Mayo', ['class' => 'nombre_form']) !!}
                {!! Form::text('p3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p3')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                {!! Form::label('p4', 'Pensión de Junio', ['class' => 'nombre_form']) !!}
                {!! Form::text('p4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p4')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p5', 'Pensión de Julio', ['class' => 'nombre_form']) !!}
                {!! Form::text('p5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p5')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p6', 'Pensión de Agosto', ['class' => 'nombre_form']) !!}
                {!! Form::text('p6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p6')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p7', 'Pensión de Setiembre', ['class' => 'nombre_form']) !!}
                {!! Form::text('p7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p7')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p8', 'Pensión de Octubre', ['class' => 'nombre_form']) !!}
                {!! Form::text('p8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p8')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p9', 'Pensión de Noviembre', ['class' => 'nombre_form']) !!}
                {!! Form::text('p9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p9')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('p10', 'Pensión de Diciembre', ['class' => 'nombre_form']) !!}
                {!! Form::text('p10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese si pagó la pensión']) !!}

                @error('p10')
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
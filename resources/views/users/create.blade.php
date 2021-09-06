@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Registrar nuevo usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'users.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre Completo', ['class' => 'nombre_form']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', 'E-mail', ['class' => 'nombre_form']) !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del alumno']) !!}

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                

            <div class="form-group">
                {!! Form::label('password', 'Contraseña', ['class' => 'nombre_form']) !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese la contraseña de la nueva cuenta', 'type' => 'password', 'class' => 'form-control']) !!}

                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                
                {!! Form::label('rol', 'Rol') !!}
                {!! Form::select('rol', $roles, null, ['class' => 'form-control', 'placeholder' => 'Elige el rol del usuario']) !!}                

                @error('rol')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
               

            <div class="form-group">
                {!! Form::submit('Registrar nuevo usuario', ['class' => 'btn btn-primary']) !!}
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
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
        @if ($id == 1)
            <div class="card-header">
                <a href="{{route('users.create')}}" class="btn btn-primary">Registrar a un nuevo usuario</a>
            </div>
        @endif
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>E-mail</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->rol}}</td>

                            @if ($id == 1)
                                <td width="10px">
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
        
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            @endif
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
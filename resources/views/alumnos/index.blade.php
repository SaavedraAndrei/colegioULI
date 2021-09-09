@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Lista de alumnos</h1>
@stop

@section('content')
    @livewire('alumnos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
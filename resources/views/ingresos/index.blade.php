@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Lista de ingresos</h1>
@stop

@section('content')
    @livewire('post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        
    </script> 
@stop
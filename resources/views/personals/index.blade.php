@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Lista del personal</h1>
@stop

@section('content')
    @livewire('personals-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
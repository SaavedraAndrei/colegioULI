@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Reportes de Contabilidad</h1>
@stop

@section('content')
    <h1>Gráficas de ingresos</h1>
 
    <div class="tablas">
        <div class="tabla1">

            <h1 class="titulo-tabla">Ingresos y Egresos</h1>
            


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tipo Contable</th>
                        <th>Monto Total</th>
                        {{-- <th>Número de Recibo</th>
                        <th>DNI Alumno</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Pago</th>
                        <th>ID Usuario</th> --}}
                    </tr>
                </thead>
        
                <tbody>
                    <tr>
                        <td>Ingresos</td>
                        <td>{{$ingresos}}</td>
                    </tr>
                    <tr>
                        <td>Egresos</td>
                        <td>{{$egresos}}</td>
                    </tr>
                </tbody>
        
                <tbody id="tbody">
                    
                </tbody>
            </table>
    
            <div class="row col-8 tabla-grafica">
                <canvas id="myChart" width="100" height="100"></canvas>
            </div>
        </div>


        <div class="tabla2">

            <h1 class="titulo-tabla">Ingresos Sección</h1>
    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sección</th>
                        <th>Monto Total</th>
                        {{-- <th>Número de Recibo</th>
                        <th>DNI Alumno</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Pago</th>
                        <th>ID Usuario</th> --}}
                    </tr>
                </thead>
        
                <tbody id="tbody1">
                    
                </tbody>
            </table>
    
            <div class="row col-8 tabla-grafica">
                <canvas id="myChart2" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
    
    

    


    <form action="{{route('all')}}" action="POST" id="form1"> 
        @csrf
        <input type="hidden" name="id" value="1">
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script>
        var productos=[];
        var valores = [];
        var valores1= [];
        $(document).ready(function(){

            $.ajax({
                url: '/consulta/all',
                method: 'POST',
                data:{
                    id: 1,
                    _token: $('input[name="_token"]').val()
                } 
            }).done(function(res){
                var arreglo = JSON.parse(res);
                console.log(arreglo);

                // for(var x=0;x<arreglo.length;x++){

                // var todo = '<tr><td>'+arreglo[0] + '</td>';
                // todo += '<td>' +arreglo[0][1]+ '</td>';
                // todo += '<td>' +arreglo[x].dni+ '</td>';
                // todo += '<td>' +arreglo[x].Tipo+ '</td>';
                // todo += '<td>' +arreglo[x].created_at+ '</td>';
                // todo += '<td>' +arreglo[x].pago+ '</td>';
                // todo += '<td>' +arreglo[x].idPersonal+ '</td>';
                // todo += '<td></td></tr>';

                // $('#tbody').append(todo);
                valores.push([arreglo[0]])

                valores1.push([arreglo[1]])
                // }
                generarGrafica();
            })
        })

        function generarGrafica(){
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['INGRESOS Y EGRESOS'],
                    datasets: [{
                        label: 'INGRESOS',
                        data: valores,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }, {
                        label: 'EGRESOS',
                        data: valores1,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

    </script>

    <script>

        var productos2=[];
        var valores2 = [];
        var valores3 = [];
        var valores4 = [];
        var valores5 = [];
        var valores6 = [];
        $(document).ready(function(){

            $.ajax({
                url: '/consulta/all1',
                method: 'POST',
                data:{
                    id: 1,
                    _token: $('input[name="_token"]').val()
                } 
            }).done(function(res){
                var arreglo1 = JSON.parse(res);
                console.log(arreglo1);

                for(var x=0;x<arreglo1.length;x++){

                    var todo = '<tr><td>'+arreglo1[x].seccion + '</td>';
                    todo += '<td>' +arreglo1[x].MontoTotal+ '</td>';
                    // todo += '<td>' +arreglo[x].Tipo+ '</td>';
                    // todo += '<td>' +arreglo[x].created_at+ '</td>';
                    // todo += '<td>' +arreglo[x].pago+ '</td>';
                    // todo += '<td>' +arreglo[x].idPersonal+ '</td>';
                    todo += '<td></td></tr>';

                    $('#tbody1').append(todo);
                
                }
                valores2.push(arreglo1[0].MontoTotal)
                valores3.push(arreglo1[1].MontoTotal)
                valores4.push(arreglo1[2].MontoTotal)
                valores5.push(arreglo1[3].MontoTotal)
                valores6.push(arreglo1[4].MontoTotal)
                generarGrafica2();
            })
        })

        function generarGrafica2(){
            var ctx = document.getElementById('myChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['INGRESOS POR SECCION - SECUNDARIA'],
                    datasets: [{
                        label: 'Primero',
                        data: valores2,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Segundo',
                        data: valores3,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Tercero',
                        data: valores4,
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Cuarto',
                        data: valores5,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Quinto',
                        data: valores6,
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }


    </script>


@stop
@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1 class="titulo-consultas">Reportes de Contabilidad</h1>
@stop

@section('content')
 
    <div class="tablas">
        <div class="tabla1">
            <h1 class="titulo-tabla">Ingresos y Egresos</h1>

            <div class="prueba-grid">
                <div class="text-grid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tipo Contable</th>
                                <th>Monto Total</th>
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
                </div>
    
                <div class="grafica-grid">
                    <div class="row col-8 tabla-grafica">
                        <canvas id="myChart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div> 
        </div>

        <div class="tabla1">
            <h1 class="titulo-tabla">Ingresos Sección - Secundaria</h1>
            
            <div class="prueba-grid">
                <div class="text-grid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sección</th>
                                <th>Monto Total</th>
                            </tr>
                        </thead>
                
                        <tbody id="tbody1">
                            
                        </tbody>
                    </table>
                </div>
    
                <div class="grafica-grid">
                    <div class="row col-8 tabla-grafica">
                        <canvas id="myChart2" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabla1">

            <h1 class="titulo-tabla">Egresos por Tipo Personal</h1>
            
            <div class="prueba-grid">
                <div class="text-grid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Monto Total</th>
                            </tr>
                        </thead>
                
                        <tbody id="tbody3">
                            
                        </tbody>
                    </table>
                </div>
    
                <div class="grafica-grid">
                    <div class="row col-8 tabla-grafica">
                        <canvas id="myChart3" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="tabla1">
            <h1 class="titulo-tabla">Ingresos Sección - Primaria</h1>
            
            <div class="prueba-grid">
                <div class="text-grid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sección</th>
                                <th>Monto Total</th>
                            </tr>
                        </thead>
                
                        <tbody id="tbody4">
                            
                        </tbody>
                    </table>
                </div>
    
                <div class="grafica-grid">
                    <div class="row col-8 tabla-grafica">
                        <canvas id="myChart4" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabla1">
            <h1 class="titulo-tabla">Ingresos Sección - Inicial</h1>
            
            <div class="prueba-grid">
                <div class="text-grid">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sección</th>
                                <th>Monto Total</th>
                            </tr>
                        </thead>
                
                        <tbody id="tbody5">
                            
                        </tbody>
                    </table>
                </div>
    
                <div class="grafica-grid">
                    <div class="row col-8 tabla-grafica">
                        <canvas id="myChart5" width="100" height="100"></canvas>
                    </div>
                </div>
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
                valores.push([arreglo[0]])
                valores1.push([arreglo[1]])
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
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'EGRESOS',
                        data: valores1,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
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


    <script>

        var valoresx = [];
        var valoresz = [];
        var valoresy = [];
        $(document).ready(function(){

            $.ajax({
                url: '/consulta/all3',
                method: 'POST',
                data:{
                    id: 1,
                    _token: $('input[name="_token"]').val()
                } 
            }).done(function(res){
                var arreglo3 = JSON.parse(res);
                console.log(arreglo3);

                for(var x=0;x<arreglo3.length;x++){

                    var todo = '<tr><td>'+arreglo3[x].Tipo + '</td>';
                    todo += '<td>' +arreglo3[x].MontoTotal+ '</td>';
                    todo += '<td></td></tr>';

                    $('#tbody3').append(todo);
                
                }
                valoresx.push(arreglo3[0].MontoTotal)
                valoresz.push(arreglo3[1].MontoTotal)
                valoresy.push(arreglo3[2].MontoTotal)
                generarGrafica3();
            })
        })

        function generarGrafica3(){
            var ctx = document.getElementById('myChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['EGRESOS POR TIPO DE PERSONAL'],
                    datasets: [{
                        label: 'Administrativo',
                        data: valoresx,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Docente',
                        data: valoresz,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Limpieza',
                        data: valoresy,
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
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

        var productos4=[];
        var valores7 = [];
        var valores8 = [];
        var valores9 = [];
        var valores10 = [];
        var valores11 = [];
        var valores12 = [];
        $(document).ready(function(){

            $.ajax({
                url: '/consulta/all4',
                method: 'POST',
                data:{
                    id: 1,
                    _token: $('input[name="_token"]').val()
                } 
            }).done(function(res){
                var arreglo4 = JSON.parse(res);
                console.log(arreglo4);

                for(var x=0;x<arreglo4.length;x++){

                    var todo = '<tr><td>'+arreglo4[x].seccion + '</td>';
                    todo += '<td>' +arreglo4[x].MontoTotal+ '</td>';
                    todo += '<td></td></tr>';

                    $('#tbody4').append(todo);
                
                }
                valores7.push(arreglo4[0].MontoTotal)
                valores8.push(arreglo4[1].MontoTotal)
                valores9.push(arreglo4[2].MontoTotal)
                valores10.push(arreglo4[3].MontoTotal)
                valores11.push(arreglo4[4].MontoTotal)
                valores12.push(arreglo4[5].MontoTotal)
                generarGrafica4();
            })
        })

        function generarGrafica4(){
            var ctx = document.getElementById('myChart4').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['INGRESOS POR SECCION - PRIMARIA'],
                    datasets: [{
                        label: 'Primero',
                        data: valores8,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Segundo',
                        data: valores10,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Tercero',
                        data: valores12,
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Cuarto',
                        data: valores7,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Quinto',
                        data: valores9,
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Sexto',
                        data: valores11,
                        backgroundColor: [
                            'rgba(87, 87, 87, 0.2)',
                        ],
                        borderColor: [
                            'rgba(87, 87, 87, 1)',
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

        var productos5=[];
        var valores13 = [];
        var valores14= [];
        $(document).ready(function(){

            $.ajax({
                url: '/consulta/all5',
                method: 'POST',
                data:{
                    id: 1,
                    _token: $('input[name="_token"]').val()
                } 
            }).done(function(res){
                var arreglo5 = JSON.parse(res);
                console.log(arreglo5);

                for(var x=0;x<arreglo5.length;x++){

                    var todo = '<tr><td>'+arreglo5[x].seccion + '</td>';
                    todo += '<td>' +arreglo5[x].MontoTotal+ '</td>';
                    todo += '<td></td></tr>';

                    $('#tbody5').append(todo);
                
                }
                valores13.push(arreglo5[0].MontoTotal)
                valores14.push(arreglo5[1].MontoTotal)
                generarGrafica5();
            })
        })

        function generarGrafica5(){
            var ctx = document.getElementById('myChart5').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['INGRESOS POR SECCION - INICIAL'],
                    datasets: [{
                        label: 'Cuatro',
                        data: valores14,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    },  {
                        label: 'Cinco',
                        data: valores13,
                        backgroundColor: [
                            'rgba(87, 87, 87, 0.2)',
                        ],
                        borderColor: [
                            'rgba(87, 87, 87, 1)',
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
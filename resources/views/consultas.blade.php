@extends('adminlte::page')

@section('title', 'ColegioULI')

@section('content_header')
    <h1>Reportes de Contabilidad</h1>
@stop

@section('content')
    <h2>Gráficas de ingresos</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Recibo</th>
                <th>DNI Alumno</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Pago</th>
                <th>ID Usuario</th>
            </tr>
        </thead>

        <tbody id="tbody">
            
        </tbody>
    </table>

    <div class="row col-6">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>


    <form action="{{route('all')}}" action="POST" id="form1"> 
        @csrf
        <input type="hidden" name="id" value="1">
        <input type="hidden" name="">
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

                for(var x=0;x<arreglo.length;x++){
                    var todo = '<tr><td>'+arreglo[x].id + '</td>';
                    todo += '<td>' +arreglo[x].NumRecibo+ '</td>';
                    todo += '<td>' +arreglo[x].dni+ '</td>';
                    todo += '<td>' +arreglo[x].Tipo+ '</td>';
                    todo += '<td>' +arreglo[x].created_at+ '</td>';
                    todo += '<td>' +arreglo[x].pago+ '</td>';
                    todo += '<td>' +arreglo[x].idPersonal+ '</td>';
                    todo += '<td></td></tr>';
                    $('#tbody').append(todo);
                    productos.push(arreglo[x].dni);
                    valores.push(arreglo[x].pago)
                }
                generarGrafica();
            })
        })

        function generarGrafica(){
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: productos,
                    datasets: [{
                        label: 'Pagos de ingresos',
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
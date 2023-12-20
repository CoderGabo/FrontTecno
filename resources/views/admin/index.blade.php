@extends('adminlte::page')

@section('title', 'Front Web')

@section('content_header')
    <h1>Hola Admin, estas son tus Ventas Mensuales</h1>
@stop

@section('content')
    <div class="container">
        <!-- Agrega un elemento div para el gráfico de Google Charts -->
        <div id="google-chart" style="height: 400px;"></div>

        <!-- Incluye el script de Google Charts -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = {!! $ventasGoogleChartData !!};

                var options = {
                    title: 'Ventas Mensuales por Producto',
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('google-chart'));
                chart.draw(google.visualization.arrayToDataTable(data), options);
            }
        </script>

        <!-- Agrega un elemento div para el gráfico de Google Charts de Ganancias Mensuales -->
        <div id="ganancias-chart" style="height: 400px;"></div>

        <!-- Incluye el script de Google Charts para Ganancias Mensuales -->
        <script type="text/javascript">
            google.charts.setOnLoadCallback(drawGananciasChart);

            function drawGananciasChart() {
                var gananciasData = {!! $gananciasGoogleChartData !!};

                var gananciasOptions = {
                    title: 'Ganancias Mensuales',
                    legend: {
                        position: 'bottom'
                    }
                };

                var gananciasChart = new google.visualization.ColumnChart(document.getElementById('ganancias-chart'));
                gananciasChart.draw(google.visualization.arrayToDataTable(gananciasData), gananciasOptions);
            }
        </script>
    </div>
    <!-- Muestra el contador de visitas -->
    <p>Esta página ha sido visitada {{ session('page_visits', 0) }} veces.</p>
@stop

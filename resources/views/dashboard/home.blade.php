@extends('layouts.bootstrap.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Dashboard</h2>
</div>

<!--<h3>Ano calendário: 2019</h3>-->
<div class="row mb-3">
    
    <div class="col">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">
                <i class="fas fa-paper-plane"></i>
                    Declarações enviadas
                </h5>
                <p class="card-text lead">
                {{ number_format($declaracoes_enviadas, 0, ",", ".") }}
                </p>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-question-circle"></i>
                    Declarações com dados omissos
                </h5>
                <p class="card-text lead">{{ number_format($declaracoes_com_dados_omissos, 0, ",", ".") }}</p>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Declarações com divergências
                </h5>
                <p class="card-text lead">{{ number_format($declaracoes_divergentes, 0, ",", ".") }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-hand-holding-usd"></i>
                    Montante não declarado
                </h5>
                <p class="card-text lead">R$ {{ number_format($montante_nao_declarado, 2, ",", ".") }}</p>
            </div>
        </div>
    </div>

</div>

<div class="row mt-3">
    <div class="col">
        <canvas id="pie-chart" class="chartjs"></canvas>
    </div>

    <div class="col">
        <canvas id="bar-chart" class="chartjs"></canvas>
    </div>
</div>

@endsection

@section('javascript')
<script>
var pieChart = document.getElementById('pie-chart');

// For a pie chart
var myPieChart = new Chart(pieChart, {
    type: 'pie',
    data: {
        datasets: [{
            data: [<?= $declaracoes_com_dados_omissos; ?>, <?= $declaracoes_divergentes; ?>],
            backgroundColor: [
                //'rgba(0, 123, 255, 0.8)', // blue
                'rgba(52, 58, 64, 0.8)', // black
                'rgba(220, 53, 69, 0.8)' // red
            ],
            borderColor: [
                //'rgba(0, 123, 255, 1)',
                'rgba(52, 58, 64, 1)',
                'rgba(220, 53, 69, 1)'
            ],
            borderWidth: 1
        }],
        labels: [//'Enviadas', 
            'Dados Omissos', 'Dados Divergentes'],
    },
    options: {
        
    }
});

var barChart = document.getElementById('bar-chart');
var myBarChart = new Chart(barChart, {
    type: 'bar',
    data: {
        labels: ['2016', '2017', '2018', '2019', '2020'],
        datasets: [{
            label: 'montante (R$) não declarado',
            data: [
                <?=$montante_nao_declarado + 20000; ?>, 
                <?=$montante_nao_declarado + 50000; ?>, 
                <?=$montante_nao_declarado - 20000; ?>, 
                <?=$montante_nao_declarado - 10000; ?>, 
                <?=$montante_nao_declarado; ?>
            ],
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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
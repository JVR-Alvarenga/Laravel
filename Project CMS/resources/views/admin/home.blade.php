@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Home')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Página Home</h1>
        </div>
        <form class="float" style="display: flex; justify-items: center" method="get">
            <select name="filter" style="margin-bottom: 50px" >
                <option {{empty($filterValue) == 30 ? 'selected':''}} value="30">Últimos 30 dias</option>
                <option {{empty($filterValue) == 60 ? 'selected':''}} value="60">Últimos 60 dias</option>
            </select>
            <button style="border: 0.5px solid; height: 24px; width: 70px; text-align: center; margin-left: 10px">Filtrar</button>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ isset($countVisits) ? $countVisits:0 }}</h3>
                    <p>Visitantes</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ isset($countUsersOnline) ? $countUsersOnline:0 }}</h3>
                    <p>Usuários Online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ isset($countPages) ? $countPages:0 }}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ isset($countUsers) ? $countUsers:0 }}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Páginas Mais Visitadas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePieGraph"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sobre o Sistema</h3>
                </div>
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            let ctx = document.getElementById('pagePieGraph').getContext('2d');
            window.pagePieGraph = new Chart (ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: {{isset($pageValues) ? $pageValues:0}},
                        backgroundColor: '#0000FF'
                    }],
                    labels: {!!isset($pageLabels) ? $pageLabels:0!!}
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    }
                }
            })
        }
    </script>

@endsection
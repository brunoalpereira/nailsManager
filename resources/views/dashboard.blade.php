@extends('layouts.main')
@section('title', 'Dashboard')

@section('styles')



@section('scripts')

@section('content')


<div class="content-wrap">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Dashboard</h4>
            </div>
            <div class="form-group col-lg-12">
                <div class="form-row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h1 class="mb-3">Bem vindo, {{$name}}</h1>
                                <h4>{{$date}}</h4>
                                <hr>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="/attendance" style="text-decoration: none">

                                                    <div class="mb-1 btn btn-success text-left w-100 p-3">
                                                        <div>
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="h4 mb-0 font-weight-bold text-light">
                                                                        Atendimentos hoje    -   {{$attendanceToday[0]->qtd}}
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="/schedules" style="text-decoration: none">

                                                    <div class="mb-1 btn btn-success text-left w-100 p-3">
                                                        <div>
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="h4 mb-0 font-weight-bold text-light">
                                                                        Agendamentos mes   -   {{$attendanceMonth[0]->qtd}}
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </a>

                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6">
                        <div class="card mt-2">
                            <div class="card-body">

                                <div class="content-wrap">
                                    <div class="main">


                                        <div>
                                            <canvas id="myChart"></canvas>
                                        </div>

                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                        <script>



                                            var serviceName = <?php echo json_encode($nameService); ?>;

                                            var qtd = <?php echo json_encode($qtd); ?>;
                                         
                                            const ctx = document.getElementById('myChart');

                                        //  var teste =   serviceName.split(',')

                                      var services = Object.values(serviceName);

                                      var qtds = Object.values(qtd);


                                        
                                        console.log(qtds)

                                            new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels:services,
                                                    datasets: [{
                                                        label: 'Serviços realizados no mes',
                                                        data: qtds,
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
                                        </script>
                                    </div>
                                </div>
                       </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
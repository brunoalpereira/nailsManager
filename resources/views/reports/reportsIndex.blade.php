@extends('layouts.main')
@section('title', 'Relatórios')

@section('styles')

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')





        <div class="content-wrap">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Relatórios</h4>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between">

                                            <a href="/reports/services-total">
                                                <i class="fas fa-file-alt"></i> Relatório total de serviços prestados </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between">
                                            <a href="/reports/services-total-operators">
                                                <i class="fas fa-file-alt"></i> Relatório total de serviços prestados por funcionarios </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between">

                                            <a href="/reports/services-total-month">
                                                <i class="fas fa-file-alt"></i> Relatório total de serviços prestados (Mês atual)  </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between">
                                            <a href="/reports/services-total-operators-current-month">
                                                <i class="fas fa-file-alt"></i> Relatório total de serviços prestados por funcionarios(Mês atual) </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between">

                                            <a href="/reports/services-total-value">
                                                <i class="fas fa-file-alt"></i> Relatório de ganhos totais  </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column flex-md-row justify-content-between">
                                            <a href="/reports/services-total-month-value">
                                                <i class="fas fa-file-alt"></i> Relatório de ganhos totais (Mês atual) </a>
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
</div>

@endsection
@extends('layouts.main')
@section('title', 'Agendamentos')

@section('styles')
<link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Agendamentos</h4>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success btn-icon-split col-lg-1 mt-3 me-md-2" href="/schedules/create">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Novo</span>
                        </a>
                    </div>
                    <div id="wrapper"></div>
                    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
                    <script src="https://unpkg.com/gridjs/l10n/dist/l10n.umd.js"></script>
                    <script>
                        var schedules = <?php echo json_encode($schedules); ?>;

                        new gridjs.Grid({
                            search: true,
                            pagination: true,
                            sort: true,
                            resizable: true,
                            style: {
                                th: {
                                    'text-align': 'center'
                                }
                            },
                            columns: [{
                                    id: 'id',
                                    hidden: true
                                },

                                "Nome", "Data", "Hora", "Serviço",

                                {
                                    name: 'Editar',
                                    formatter: (cell, row) =>
                                        gridjs.html(`<a class="btn btn-secondary id="editar"  mx-2" href="/schedules/edit/${row.cells[0].data}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>`)
                                },
                                {
                                    name: 'Cancelar',
                                    formatter: (cell, row) =>

                                        gridjs.html(`<form action="/schedules/cancel/${row.cells[0].data}" method="POST">
                                @csrf
                                @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-cancel"></i>
                                            </span>
                                            <span class="text">Cancelar</span></button>
                                            </form>`)
                                }
                            ],
                            data: schedules,
                            language: {
                                'search': {
                                    'placeholder': '🔍 Pesquisa'
                                },
                            }
                        }).render(document.getElementById("wrapper"));
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
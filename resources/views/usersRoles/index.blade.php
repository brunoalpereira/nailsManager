@extends('layouts.main')
@section('title', 'Atribuir Cargos')
@section('styles')
<link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
@section('scripts')

@section('content')

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Atribuir Cargos</h4>
                    </div>

                    <div id="wrapper"></div>
                    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
                    <script>
                        var users = <?php echo json_encode($users); ?>;
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
                                }, {
                                    name: "Nome",
                                },

                                {
                                    name: 'Atribuir',

                                    formatter: (cell, row) =>
                                        gridjs.html(`<a class="btn btn-primary  mx-2" href="/users-roles/edit/${row.cells[0].data}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-briefcase"></i>
                                            </span>
                                            <span class="text">Atribuir</span>
                                        </a>`)
                                },
                            ],
                            data: users,
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
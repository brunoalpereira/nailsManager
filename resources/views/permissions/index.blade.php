@extends('layouts.main')
@section('title', 'Serviços')
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
                        <h4 class="card-title text-center">Permissões</h4>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    </div>
                    <div id="wrapper"></div>
                    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
                    <script>
                        var permissions = <?php echo json_encode($permissions); ?>;
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
                                    name: 'Editar',

                                    formatter: (cell, row) =>
                                        gridjs.html(`<a class="btn btn-secondary  mx-2" href="/permissions/edit/${row.cells[0].data}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>`)
                                },
                            ],
                            data: permissions,
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
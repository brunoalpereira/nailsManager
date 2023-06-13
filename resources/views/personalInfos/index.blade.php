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
                        <h4 class="card-title text-center">Informações Cadastrais</h4>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success btn-icon-split col-lg-1 mt-3 me-md-2" href="/personal-infos/create">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Novo</span>
                        </a>
                    </div>
                    <div id="wrapper"></div>
                    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js"></script>
                    <script>
                        var infos = <?php echo json_encode($personalInfos); ?>;
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
                                "Nome", "Endereço", "Telefone",
                                {
                                    name: 'Editar',

                                    formatter: (cell, row) =>
                                        gridjs.html(`<a class="btn btn-secondary  mx-2" href="/personal-infos/edit/${row.cells[0].data}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>`)
                                }, {
                                    name: 'Excluir',
                                    formatter: (cell, row) =>

                                        gridjs.html(`<form action="/personal-infos/delete/${row.cells[0].data}" method="POST">
                                @csrf
                                @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Excluir</span></button>
                                            </form>`)
                                },
                            ],
                            data: infos,
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
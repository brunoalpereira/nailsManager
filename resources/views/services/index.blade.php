@extends('layouts.main')
@section('title', 'Serviços')

@section('scripts')



@section('content')


<div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title text-center">Serviços</h4>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-icon-split col-lg-1 mt-3 me-md-2" href="/services/create">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Novo</span>
                    </a>
                </div>     
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row justify-content-between">
                            <a class="card-title" href="/services/edit/">Card title</a>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                           
                            <div class="d-grid  d-md-flex justify-content-md-end">

                            <a class="btn btn-secondary mx-2" href="/services/edit">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Editar</span>
                                </a>
                                <a class="btn btn-danger" href="/services/create">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Excluir</span>
                                </a>
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
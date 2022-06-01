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
                <h4 class="card-title">Cadastrar Serviços</h4>
                </div>
                <div class="card-body">

                <form id="form-create-services">
                    <div class="d-flex flex-column flex-sm-row" id="form-row-classes">

                     
                     </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label>Nome</label>
                                <span class="text-danger">*</span>
                                <input type="text"  class="form-control" id="service-name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                            <label>Valor</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="service-value">
                            </div>
                        </div>
                    
                </div>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label>Descrição</label>
                                <span class="text-danger">*</span>
                                <textarea class="form-control" id="service-description"style ="height:150px" ></textarea>
                            </div>
                        </div>
                      
                    </div>
                    </div>
                    <div class="form-row">
                        <button class="btn btn-success btn-icon-split float-right" type="submit" id="btnSubmit">
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Salvar</span>
                        </button>

                        <button class="btn btn-danger btn-icon-split float-right ml-2" type="submit" id="btnSubmit">
                            <span class="icon text-white-50">
                                <i class="fas fa-cancel"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </button>
                    </div>
                </form>             
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection
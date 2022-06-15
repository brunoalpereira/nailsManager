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
                <h4 class="card-title">Editar Serviços</h4>
                </div>
                <div class="card-body">
                <form action="/services/update/{{ $services->id }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label>Nome</label>
                                <span class="text-danger">*</span>
                                <input type="text"  class="form-control" id="name" name="name"  value="{{ $services->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                            <label>Valor</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="value" name="value" value="{{ $services->value }}">
                            </div>
                        </div>
                    
                </div>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label>Descrição</label>
                                <span class="text-danger">*</span>
                                <textarea class="form-control" id="description" name="description" style ="height:150px" >{{ $services->description}}</textarea>
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

                        <!-- <button class="btn btn-danger btn-icon-split float-right ml-2" type="submit" id="btnSubmit">
                            <span class="icon text-white-50">
                                <i class="fas fa-cancel"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </button> -->
                    </div>
                </form>             
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection
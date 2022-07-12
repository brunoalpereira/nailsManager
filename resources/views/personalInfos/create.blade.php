@extends('layouts.main')
@section('title', 'Serviços')

@section('styles')

<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.css" rel="stylesheet"></link>

 @section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')

<div class="content-wrap ">
    <div class="main">
        <div class="container-fluid">
            <div class="col-md-12 mx-auto">

                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Cadastrar Informações</h4>
                        <hr>
                        <form action="/personal-infos" id="form-create-personal infos" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-12">
                            <div class="form-row">
                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Endereço" type="text" id="address" name="address">
                                </div>

                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-pen"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Complemento" id="complement" name="complement">
                                </div>
                            </div>
                            </div>


                            <div class="form-group col-lg-12">
                            <div class="form-row">
                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Cep" type="text" id="cep" name="cep">
                                </div>

                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-house-user"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Numero Residencia" id="address_number" name="address_number">
                                </div>
                            </div>
                            </div>


                            <div class="form-group col-lg-12">
                            <div class="form-row">
                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Telefone" type="phone" id="phone" name="phone">
                                </div>


                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <select class="form-control" placeholder="Usuario"  id="user" name="user" >
                                        <option value="1">teste</option>
                                        <option value="2">require_once</option>
                                    </select>
                                </div>


                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-success btn-icon-split float-left" type="submit" id="btnSubmit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Salvar</span>
                                </button>
                        </form>
                    </article>
                </div>
                </aside>
            </div>

        </div>




<!-- <script type="text/javascript" src="{{url('assets\js\personal-infos\index.js') }}"></script> -->
@endsection
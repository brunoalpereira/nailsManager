@extends('layouts.main')
@section('title', 'Serviços')

@section('styles')

<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.css" rel="stylesheet">
</link>

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
                                        <input class="form-control @error('address') is-invalid  @enderror" placeholder="Endereço" type="text" id="address" name="address">
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('address')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-pen"></i> </span>
                                        </div>
                                        <input class="form-control @error('complement') is-invalid  @enderror" placeholder="Complemento" id="complement" name="complement">
                                        @if ($errors->has('complement'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('complement')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input class="form-control @error('cep') is-invalid  @enderror" placeholder="Cep" type="text" id="cep" name="cep">
                                        @if ($errors->has('cep'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('cep')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-house-user"></i> </span>
                                        </div>
                                        <input class="form-control @error('address_number') is-invalid  @enderror" placeholder="Numero Residencia" id="address_number" name="address_number">
                                        @if ($errors->has('address_number'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('address_number')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input class="form-control @error('phone') is-invalid  @enderror" placeholder="Telefone" type="phone" id="phone" name="phone">
                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('phone')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>

                                    @role('admin|operador')
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <select class="form-control @error('id_user') is-invalid  @enderror" id="user" name="id_user">
                                            <option value=></option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_user'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('id_user')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>

                                    @else
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <select class="form-control @error('id_user') is-invalid  @enderror" id="user" name="id_user">
                                        
                                            <option value="{{$user}}">{{$userName[0]->name}}</option>
    
                                        </select>

                                    @endrole


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




        <script>
            new SlimSelect({
                select: '#user',
                placeholder: 'Selecione usuário',
                searchingText: 'Pesquisar'
            })
        </script>
        @endsection
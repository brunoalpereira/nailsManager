@extends('layouts.main')
@section('title', 'Serviços')

@section('scripts')



@section('content')
<div class="content-wrap ">
    <div class="main">
        <div class="container-fluid">
            <div class="col-md-12 mx-auto">

                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Cadastrar Serivços</h4>
                        <hr>
                        <form action="/services/update/{{ $services->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-pencil"></i> </span>
                                        </div>
                                        <input class="form-control form-control @error('name') is-invalid  @enderror" placeholder="Nome" type="text" id="name" name="name" value="{{ $services->name }}">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('name')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-money-bill"></i> </span>
                                        </div>
                                        <input class="form-control form-control @error('value') is-invalid  @enderror" placeholder="Valor" id="password" name="value" value="{{ $services->value }}">
                                        @if ($errors->has('value'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('value')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class=" form-group  col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">


                                                <i class="fas fa-pencil-ruler"></i> </span>
                                        </div>
                                        <textarea class="form-control @error('description') is-invalid  @enderror" id="description" name="description" placeholder="Descrição" style="height:80px">{{ $services->description}}</textarea>
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('description')}}

                                            </strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
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


        @endsection
@extends('layouts.main')
@section('title', 'Permissões')


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
                        <h4 class="card-title text-center mb-4 mt-1">Cadastrar Permissões</h4>
                        <hr>
                        <form action="/permissions" id="form-create-permissions" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-pencil"></i> </span>
                                        </div>
                                        <input class="form-control @error('name') is-invalid  @enderror" placeholder="Nome" type="text" id="name" name="name">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('name')}}

                                            </strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <select id="multiple" class="form-control @error('role') is-invalid  @enderror" name='role[]' placeholder="Selecione cargos para permissão" multiple>
                                         @foreach($roles as $role)
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                         @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('role')}}

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

        <script type="text/javascript" src="{{url('assets\js\permissions\create.js') }}"></script>
@endsection
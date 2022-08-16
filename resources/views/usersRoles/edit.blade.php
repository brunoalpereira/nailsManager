@extends('layouts.main')
@section('title', 'Atribuir Cargos')

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
                        <h4 class="card-title text-center mb-4 mt-1">Atribuir Cargos</h4>
                        <hr>
                        <form action="/users-roles/update/{{ $users->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @method('PUT')
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="far fa-user"></i> </span>
                                        </div>
                                        <input class="form-control" placeholder="Nome" type="text" id="name" name="name"  value="{{ $users->name }}" disabled>
                                    </div>
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <select id="multiple" class="form-control" name='role[]' placeholder="Selecione cargos para usuário" multiple>
                                         @foreach($oldRoles as $oldRole)
                                         <option value="{{$oldRole->id}}" { selected }>{{$oldRole->name}}</option>
                                         @endforeach

                                          @foreach($roles as $role)
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                         @endforeach
                                        </select>
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

        <script type="text/javascript" src="{{url('assets\js\permissions\edit.js') }}"></script>
@endsection
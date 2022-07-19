@extends('layouts.main')
@section('title', 'Agendamentos')

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
                        <h4 class="card-title text-center mb-4 mt-1">Agendamento</h4>
                        <hr>
                        <form action="/schedules" id="form-create-schedules" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-12">
                            <div class="form-row">
                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="data" type="date" id="date" name="date">
                                </div>

                                <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-clock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Hora" id="hour" name="hour" type ="time">
                                </div>
                            </div>
                            </div>
                            <div class="form-group col-lg-12">
                            <div class="form-row">
                            <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <select class="form-control" placeholder="Cliente"  id="user" name="user_id" >
                                        <option value="1">teste</option>
                                        <option value="2">require_once</option>
                                    </select>
                            </div>                      
                            
                            <div class="form-group col-lg-12">
                            <div class="form-row">
                            <div class="input-group col-lg-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-pencil-ruler"></i> </span>
                                    </div>
                                    <textarea class="form-control" id="observations" name="observations" placeholder="Observações" style="height:80px"></textarea>
                                </div>
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
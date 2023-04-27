@extends('layouts.main')
@section('title', 'Agendamentos')

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
                        <h4 class="card-title text-center mb-4 mt-1">Finalizando antendimentos</h4>
                        <hr>

                        <form action="/attendance/finish/{{ $schedules[0]->id }}" id="form-edit-schedules" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-lg-12">
                                <div class="form-row">
                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input class="form-control @error('date') is-invalid  @enderror" placeholder="data" type="date" id="date" name="date" value="{{ $schedules[0]->date }}">
                                        @if ($errors->has('date'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('date')}}

                                            </strong>
                                        </span>

                                        @endif
                                    </div>

                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-clock"></i> </span>
                                        </div>
                                        <input class="form-control @error('hour') is-invalid  @enderror" placeholder="Hora" id="hour" name="hour" type="time" value="{{ $schedules[0]->hour }}">

                                        @if ($errors->has('hour'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('hour')}}

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
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <select id="multiple_user" class="form-control @error('user_id') is-invalid  @enderror" name='user_id' placeholder="Selecione usuario">
                                            <option value="{{$schedules[0]->user_id}}" { selected }>{{$schedules[0]->user_name}}</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('user_id'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('user_id')}}

                                            </strong>
                                        </span>

                                        @endif
                                    </div>

                                    <div class="input-group col-lg-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil"></i></span>
                                        </div>
                                        <select id="multiple_services" class="form-control @error('services') is-invalid  @enderror" name='services[]' placeholder="Selecione serviços" multiple>

                                            @foreach ($schedules as $schedule )
                                            <option value="{{$schedule->service_id}}" { selected }>{{$schedule->service}}</option>
                                            @endforeach


                                            @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('services'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('services')}}

                                            </strong>
                                        </span>

                                        @endif
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




        <script>
            new SlimSelect({
                select: '#multiple_services',
                placeholder: 'Selecione serviço',
                searchingText: 'Pesquisar'
            })

            new SlimSelect({
                select: '#multiple_user',
                placeholder: 'Selecione serviço',
                searchingText: 'Pesquisar'
            })
        </script>
        @endsection
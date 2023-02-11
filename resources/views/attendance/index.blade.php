@extends('layouts.main')
@section('title', 'Atendimentos')

@section('styles')

@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
<div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title text-center">Atendimentos</h4>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-icon-split col-lg-1 mt-3 me-md-2" href="/attendance/create">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Novo</span>
                    </a>
                </div>     
                @foreach($schedules as $schedule)
                <div class=" col-lg-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between">

                                <a class="card-title col-lg-2" href="/attendance/edit//{{ $schedule->schedules }}">{{ $schedule->user}}</a>
                                <label class="card-text col-lg-2" >Data
                                <h6>{{  date( 'd/m/Y' , strtotime($schedule->date)) }}</h6>
                                </label>

                                <label class="card-text col-lg-2" >Hora
                                <h6>{{ $schedule->hour }}</h6>
                                </label>
                                @if ( $schedule->status  =='Finalizado')
                                <label class="card-text col-lg-2">Status
                                <h6><span class="badge badge-success">{{ $schedule->status }}</span></h6>
                                </label>
                                @elseif ( $schedule->status =='agendado')
                                <label class="card-text col-lg-2">Status
                                <h6><span class="badge badge-primary">{{ $schedule->status }}</span></h6>
                                </label>
                                
                                @endif
                              
                            
                                <div class="d-grid  d-lg-flex justify-content-lg-end">
                                    <form>
                                        <a class="btn btn-success  mx-2" href="/attendance/edit/{{ $schedule->schedules }}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Finalizar</span>
                                        </a>
                                    </form>
                                    <form action="/schedules/cancel/{{ $schedule->schedules }}" method="POST">
                                @csrf
                                @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-cancel"></i>
                                            </span>
                                            <span class="text">Cancelar</span></button>
                                    </form>

                                    
                                </div>                            
                            </div>
                        </div>
                            
                    </div>
                 </div>   
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
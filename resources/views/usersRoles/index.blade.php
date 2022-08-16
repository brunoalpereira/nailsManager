@extends('layouts.main')
@section('title', 'Atribuir Cargos')

@section('scripts')



@section('content')

<div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title text-center">Atribuir Cargos</h4>
                </div>
         
                @foreach($users as $user)
                <div class=" col-lg-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between">

                                <a class="card-title col-lg-2" href="/users-roles/edit/{{ $user->id }}">{{ $user->name }}</a>
                            
                                <div class="d-grid  d-lg-flex justify-content-lg-end">
                                    <form>
                                        <a class="btn btn-primary  mx-2" href="/users-roles/edit/{{ $user->id }}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-briefcase"></i>
                                            </span>
                                            <span class="text"> Atribuir</span>
                                        </a>
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
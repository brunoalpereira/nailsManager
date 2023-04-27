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
                <h4 class="card-title text-center">Permissões</h4>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-icon-split col-lg-1 mt-3 me-md-2" href="/permissions/create">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Novo</span>
                    </a>
                </div>     
                @foreach($permissions as $permission)
                <div class=" col-lg-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between">

                                <a class="card-title col-lg-2" href="/permissions/edit/{{ $permission->id }}">{{ $permission->name }}</a>
                            
                                <div class="d-grid  d-lg-flex justify-content-lg-end">
                                    <form>
                                        <a class="btn btn-secondary  mx-2" href="/permissions/edit/{{ $permission->id }}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>
                                    </form>
                                    <form action="/permissions/delete/{{ $permission->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Excluir</span></button>
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
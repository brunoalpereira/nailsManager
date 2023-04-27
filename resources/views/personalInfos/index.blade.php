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
                <h4 class="card-title text-center">Informações Cadastrais</h4>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-icon-split col-lg-1 mt-3 me-md-2" href="/personal-infos/create">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Novo</span>
                    </a>
                </div>     
                @foreach($personalInfos as $info)
                <div class=" col-lg-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <a class="card-title col-lg-2" href="/personal-infos/edit/{{ $info->id }}">{{ $info->name }}</a>
                                <label class="card-text col-lg-2" >Endereço
                                <h6 >{{$info->address}}                    
                                </h6> 
                                </label>
                                <label class="card-text col-lg-2" >Telefone
                                <h6 >{{$info->phone}}                    
                                </h6> 
                                </label>
                            
                                <div class="d-grid  d-lg-flex justify-content-lg-end">
                                    <form>
                                        <a class="btn btn-secondary  mx-2" href="/personal-infos/edit/{{ $info->id }}">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>
                                    </form>
                                    <form action="/personal-infos/delete/{{ $info->id }}" method="POST">
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
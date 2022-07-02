@extends('layouts.main')
@section('title', 'Cadastro')
@section('scripts')

@section('content')

<div class="content-wrap ">
    <div class="main">
        <div class="container-fluid">
            <div class="col-md-6 mx-auto">

                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Cadastro</h4>
                        <hr>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input id="name" class="form-control" placeholder="Nome" type="text" name="name" :value="old('name')" required autofocus />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')">
                                </div>
                            </div>
                            <div class=" form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input id="password" class="form-control" placeholder="Senha" id="password" type="password" name="password" required autocomplete="new-password"/>
                                </div>
                            </div>
                            <div class=" form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input id="password_confirmation" class="form-control" placeholder="Confirmar senha" id="password" type="password" name="password_confirmation" required />
                                </div>
                                <div class="flex items-center justify-end mt-4 mb-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Ja Cadastrado?') }}
                                    </a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block"> Cadastrar </button>
                        </form>
                    </article>
                </div>

                </aside>
            </div>

        </div>
        @endsection
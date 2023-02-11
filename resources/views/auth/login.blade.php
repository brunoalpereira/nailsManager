@extends('layouts.main')
@section('title', 'Login')

@section('scripts')



@section('content')



<div class="content-wrap ">
    <div class="main">
        <div class="container-fluid">
            <div class="col-md-6 mx-auto">

                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Login</h4>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')"">
                            </div>
                        </div>
                        <div class=" form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        </div>
                                        <input class="form-control" placeholder="senha" id="password" type="password" name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('lembrar-se') }}</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block"> Login </button>
                                </div>
                                @if (Route::has('register'))
                                <a class="underline text-center text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                    {{ __('Cadastrar ?') }}
                                </a>
                                @endif
                        </form>
                    </article>
                </div>

                </aside>
            </div>

        </div>
        @endsection
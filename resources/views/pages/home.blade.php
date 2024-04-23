@extends('components.layouts.login')

@section('content')


<div class="container">

    <div class="text-center">
        <img src="https://saudehappy.com.br/wp-content/uploads/2021/09/HAPPY.jpg" class="" height="300">

        <h1 class="text-center text-success">Seja bem-vindo(a)!</h1>
        <p class="text-center">Acessar Desafio Desenvolvedor PHP</p>

        <a href="{{ route('admin.login')}}" class="btn btn-primary btn-lg">Acessar</a>

    </div>
</div>

@endsection

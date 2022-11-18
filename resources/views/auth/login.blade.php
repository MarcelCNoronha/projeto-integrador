@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row mt-5">
        <div>
          <img src="image/logo.jpg" alt="logo">
        </div>
          <div class="mt-1" >
            <h2>Confira as oportunidades</h2>
          </div>     
          <div class="mt-2">
            <p>Informe suas credênciais para acessar a plataforma</p>
          </div>
      </div>

    <div class="row mt-3 offset-md-4">
      <form class="col-md-6 text-start">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Digite seu email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Digite sua senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn:hover btn-text col-12">Entrar</button>
        </div>
      </form>
    </div>
</div>

@endsection


@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row mt-5">
        <div>
          <img src="/image/logo.jpg" alt="logo">
        </div>
          <div class="mt-1" >
            <h2>Perdeu sua senha?</h2>
          </div>     
          <div class="mt-2">
            <p>Informe seu e-mail para recuperar sua senha</p>
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
        <button type="submit" class="btn btn:hover btn-text col-12">Recuperar senha</button>
        </div>
      </form>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container text-center">
    <div class="row mt-5">
      <div>
        <img src="/image/logo.jpg" alt="logo">
      </div>
        <div class="mt-1">
          <h2>Digite uma nova senha</h2>
        </div>     
        <div class="mt-1">
          <p>Atenção, sua senha deve conter pelo menos 8 caracteres.</p>
        </div>
    </div>

    <div class="row mt-2 offset-md-4">
      <form class="col-md-6 text-start">
        <div class="mb-2">
          <label for="exampleInputPassword1" class="form-label">Crie sua senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
        </div>
        <div class="mb-2">
            <label for="exampleInputPassword2" class="form-label">Confirmar senha</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Digite sua senha novamente">
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn:hover btn-text col-12">Continuar</button>
        </div>
      </form>
    </div>
</div>
@endsection

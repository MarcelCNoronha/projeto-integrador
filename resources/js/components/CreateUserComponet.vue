<template>
    <div class="container text-center">
        <div class="row">
            <div>
                <img src="/image/logo.jpg" alt="logo">
            </div>
            <div>
                <h2>Agora  iremos realizar o seu cadastro</h2>
            </div>
                <div class="mt-1">
                    <p>Atenção ao preencher os dados , utilize dados atuais e
                        selecione uma senha que consiga recordar.</p>
                </div>
        </div>
        <div class="row mt-2 offset-md-4">
            <form class="col-md-6 text-start">
            <div class="mb-2">
                <label for="exampleInputName" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Digite seu nome">
            </div>
            <div class="mb-2">
                <label for="exampleInputtel" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="exampleInputName" placeholder="(00) 00000-0000">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Digite seu email">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Crie sua senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword2" class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Digite sua senha novamente">
            </div>
            <div class="mb-2">
                <p>O que procura?</p>
                <select class="form-control" name="atividade" id="">
                    <option value="Selecionar">Selecionar</option>
                    <option value="emprego">Emprego</option>
                    <option value="trabalhador">Colaborador</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn:hover btn-text col-12">Realizar cadastro</button>
            </div>
            </form>
        </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
</style>

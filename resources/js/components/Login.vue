<template>
    <div class="container text-center">
        <div class="row">
        <div>
            <img src="/image/logo.jpg" alt="logo">
        </div>
        <div class="mt-0" >
            <h2>Confira as oportunidades</h2>
        </div>
        <div class="mt-0">
            <p>Informe suas credênciais para acessar a plataforma</p>
        </div>
        <div class="row mt-2 offset-md-4">
        <form class="col-md-4 text-start">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Digite seu email" v-model="form.email" :disabled="filledEmail">
            </div>
            <div v-if="filledEmail && isUser" class="mb-3">
                <label for="exampleInputPassword" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password"
            placeholder="Digite a sua senha" v-model="form.password">
            </div>

            <div v-if="filledEmail && !isUser">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="Name"
                    placeholder="Digite seu nome" v-model="form.name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPhone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone"
                    placeholder="Digite seu telefone" v-model="form.phone">
                </div>

                <div class="mb-3">
                    <label for="exampleInputAge" class="form-label">Idade</label>
                    <input type="number" class="form-control" id="age"
                    placeholder="Digite a sua idade" v-model="form.age">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Minha senha</label>
                    <input type="password" class="form-control" id="password"
                    placeholder="Digite a sua senha" v-model="form.password">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Repita sua senha</label>
                    <input type="password" class="form-control" id="password"
                    placeholder="Repita a sua senha" v-model="form.repeatPassword">
                </div>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn:hover btn-text col-12" @click="getIsUser()"> Entrar</button>
                <!-- {{isUser}} -->
                <!--
                <div v-for="(service,index) in services" :key="index">
                    {{service.name}}
                </div> -->
            </div>
            </form>
        </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                form:
                {
                    email: '',
                    password:'',
                    name:'',
                    phone:'',
                    age:'',
                    active: 1,
                    repeatPassword: ''
                },
                isUser: '',
                filledEmail: false
                // services:[]
            }
        },
        mounted() {
            // this.reserchService();
        },
        methods:{
            getIsUser(){
                axios({
                    method: 'get',
                    url: '/api/user/is-user/' + this.form.email
                }).then((response)=> {
                   this.isUser       = response.data.sucess;
                   this.filledEmail = true;
                })

            }

            // reserchService(){
            //     axios({
            //         method: 'get',
            //         url: '/api/services'
            //     }).then((response)=> {
            //        this.services =response.data;
            //     })
            // }
        }

    }
</script>
<style>
</style>

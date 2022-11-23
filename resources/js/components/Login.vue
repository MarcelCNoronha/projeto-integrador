<template>
    <div class="container text-center">
        <div class="row mt-5">
        <div>
            <img src="/image/logo.jpg" alt="logo">
        </div>
        <div class="mt-1" >
            <h2>Confira as oportunidades</h2>
        </div>
        <div class="mt-2">
            <p>Informe suas credênciais para acessar a plataforma</p>
        </div>
        <div class="row mt-3 offset-md-4">
        <form class="col-md-6 text-start">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Digite seu email" v-model="form.email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Digite sua senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn:hover btn-text col-12" @click="getIsUser()">Entrar</button>

<!--
                <div v-for="(service,index) in services" :key="index">
                    {{service.name}}
                </div> -->

            </div>
            </form>
            </div>
            {{isUser}}
            </div>
            {{isUser}}
        </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                form:
                {
                    email: ''
                },
                isUser: ''
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
                    url: '/user/is-user/' + this.form.email
                }).then((response)=> {
                   this.isUser =response.data.sucess;
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

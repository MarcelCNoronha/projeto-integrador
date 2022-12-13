<template>
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
</template>

<script>
import axios from 'axios';
    import { useVuelidate } from '@vuelidate/core';
    import { required } from '@vuelidate/validators';
    import Swal from 'sweetalert2';
    export default {
        setup: ()   => ({ v$: useVuelidate() }),
        data() {
            return {
                form: {
                    email: ''
                },
                submitted: false,
                sent: false,
                not_sent: false
            }
        },
        validations() {
            return {
                form: {
                    email: {required}
                }
            }            
        },
        methods: {
            post() {
                this.submitted = true;
                this.sent = false;
                this.not_sent = false;
                if(this.v$.form.$invalid)
                    return;
                Swal.fire({
                    title: "Enviando...",
                    text: "Aguarde enquanto estamos enviando o email de redefinição.",
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                axios({
                    method: 'post',
                    url: '/api/forgot-password',
                    data: this.form
                }).then((response) => {
                    if(response.data.success) {
                        this.sent = true;                          
                    } else {
                        this.not_sent = true;
                    }                    
                    Swal.close();
                });
            }
        }
    }
</script>
<style>
</style>

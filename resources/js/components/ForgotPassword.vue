<template>
    <div class="container text-center">
        <div class="row mt-5">

            <div v-if="error"
                 class="alert alert-danger mt-5
                 col-4 offset-4" role="alert"
                 >
                    Email inexistente.
             </div>

             <div v-if="success"
                 class="alert alert-success mt-5
                 col-6 offset-3" role="alert"
                 >
                    Enviamos para o seu e-mail as instruções para redefinir a sua senha.
             </div>

            <div>
                <img src="/image/logo.jpg" alt="logo">
            </div>
            <div class="mt-1" >
                <h2>Perdeu sua senha?</h2>
            </div>
            <div class="mt-2">
                <p>Informe seu e-mail para que possamos enviar as instruções para redefinir sua senha.</p>
            </div>
        </div>

        <div class="row mt-3 offset-md-4">
            <form class="col-md-6 text-start">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input
                type="email"
                class="form-control"
                :class="{'is-invalid': submitted && v$.form.email.$invalid}"
                id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Digite seu email"
                v-model="form.email">
            </div>
            <div class="mb-3">
                <button
                type="submit"
                class="btn btn:hover btn-text col-12">
                Recuperar senha
            </button>
            </div>
        </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { useVuelidate } from '@vuelidate/core'
    import { required } from '@vuelidate/validators'
    import Swal from 'sweetalert2';

    export default {
         setup: () => ({ v$: useVuelidate() }),

        data() {
            return {
                form:
                {
                    email: ''
                },
                submitted: false
            }
        },
        validations() {
            return {
                form:{
                    email: {required},

                }
            }
        },
        mounted() {
            // this.reserchService();
        },
        methods:{
            post(){
                this.submitted = true;
                if(this.v$.form.$invalid)
                    return;
            },
        }
    }
</script>
<style>
</style>

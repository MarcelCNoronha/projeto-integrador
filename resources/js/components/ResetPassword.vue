<template>

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
                <input type="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="Digite sua senha"
                v-model="form.password">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword2" class="form-label">Confirmar senha</label>
                <input type="password"
                class="form-control"
                id="exampleInputPassword2"
                placeholder="Repita sua senha"
                v-model="form.repeatPassword">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn:hover btn-text col-12">Continuar</button>
            </div>
        </form>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    import { useVuelidate } from '@vuelidate/core'
    import { required, requiredIf } from '@vuelidate/validators'
    import Swal from 'sweetalert2';

    export default {

        setup: () => ({ v$: useVuelidate() }),

        data() {
            return {
                form:
                {
                    password:'',
                    repeatPassword: ''
                },
                submitted: false,
                error: false,
                message: ''
            }
        },
        validations() {
            return {
                form:{
                    repeatPassword: {required: requiredIf(function(){
                        return this.filledEmail && !this.isUser
                    })},

                    password: {required: requiredIf(function(){
                        return this.filledEmail
                    })}
                }
            }
        },
        methods:{

            igualPassword(){
                return this.form.password == this.form.repeatPassword;
            }

        }

    }
</script>
<style>
</style>

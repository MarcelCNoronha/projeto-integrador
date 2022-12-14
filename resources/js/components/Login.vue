<template>
    <div class="container text-center">
        <div class="row">
                 <div v-if="error"
                 class="alert alert-danger mt-5
                 col-4 offset-4" role="alert">
                    {{message}}
             </div>
        <div>
            <img src="/image/logo.jpg" alt="logo">
        </div>
        <div class="mt-0" >
            <h2>Confira as oportunidades</h2>
        </div>
        <div class="mt-0">
            <p>Informe suas credênciais para acessar a plataforma</p>
        </div>
        <div class="row mt-2 offset-md-3">
        <form class="col-md-6 text-start">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input
                type="email"
                class="form-control"
                :class="{'is-invalid': submitted && v$.form.email.$invalid}"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Digite seu email"
                v-model="form.email"
                :disabled="filledEmail">
            </div>

            <div
                v-if="submitted && v$.form.email.required.$invalid"
                class="text-danger">
                O campo email é obrigatório
            </div>

            <div
                v-if="submitted && v$.form.email.email.$invalid"
                class="text-danger">
                O campo email deve ser um email válido
            </div>


            <div v-if="filledEmail && isUser" class="mb-3">
                <label for="exampleInputPassword" class="form-label">Senha</label>
                <input
                    type="password"
                    class="form-control"
                    :class="{'is-invalid': submitted && v$.form.password.$invalid}"
                    id="password"
                    placeholder="Digite a sua senha"
                    v-model="form.password">
                <div
                    v-if="submitted && v$.form.password.$invalid"
                    class="text-danger">
                    O campo senha é obrigatório
                </div>
                <a href="/forgot-password/ + {{this.form.email}}">
                    <!-- corrigir concatenação -->
                    Recuperar senha
                </a>
            </div>



            <div v-if="filledEmail && !isUser">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nome</label>
                    <input
                        type="text"
                        class="form-control"
                        :class="{'is-invalid': submitted && v$.form.name.$invalid}"
                        id="Name"
                        placeholder="Digite seu nome"
                        v-model="form.name">
                        <div
                            v-if="submitted && v$.form.name.$invalid"
                            class="text-danger">
                            O campo nome é obrigatório
                        </div>
                </div>



                <div class="mb-3">
                    <label for="exampleInputPhone" class="form-label">Telefone</label>
                    <input
                        type="text"
                        class="form-control" id="phone"
                        :class="{'is-invalid': submitted && v$.form.phone.$invalid}"
                        placeholder="Digite seu telefone"
                        v-model="form.phone"
                        v-mask-phone.br
                        >
                        <div
                            v-if="submitted && v$.form.phone.required.$invalid"
                            class="text-danger">
                            O campo telefone é obrigatório
                        </div>

                        <div
                        v-if="submitted && v$.form.phone.minLenght.$invalid"
                            class="text-danger">
                            O campo telefone está incompleto
                        </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputAge" class="form-label">Idade</label>
                    <input
                        type="number"
                        class="form-control"
                        :class="{'is-invalid': submitted && v$.form.age.$invalid}"
                        id="age"
                        placeholder="Digite a sua idade"
                        v-model="form.age">
                        <div
                            v-if="submitted && v$.form.age.required.$invalid"
                            class="text-danger">
                            O campo idade é obrigatório
                        </div>
                        <div
                            v-if="submitted && v$.form.age.minValue.$invalid"
                            class="text-danger">
                            O campo idade tem que ser superior a 1 ano
                        </div>
                </div>



                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Minha senha</label>
                    <input
                        type="password"
                        class="form-control"
                        :class="{'is-invalid': submitted && v$.form.password.$invalid}"
                        id="password"
                        placeholder="Digite a sua senha"
                        v-model="form.password">
                        <div
                            v-if="submitted && v$.form.password.required.$invalid"
                            class="text-danger">
                            O campo senha é obrigatório
                        </div>
                        <div
                            v-if="submitted && v$.form.password.minLenght.$invalid"
                            class="text-danger">
                            O campo senha deve ter no minimo 8 digitos
                        </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Repita sua senha</label>
                    <input
                    type="password"
                    class="form-control"
                    :class="{'is-invalid': submitted && v$.form.repeatPassword.$invalid}"
                    id="password2"
                    placeholder="Repita a sua senha"
                    v-model="form.repeatPassword">
                    <div
                        v-if="submitted && v$.form.repeatPassword.required.$invalid"
                        class="text-danger">
                        O campo senha é obrigatório
                    </div>
                    <div
                        v-if="submitted && v$.form.repeatPassword.minLenght.$invalid"
                        class="text-danger">
                        O campo senha deve ter no minimo 8 digitos
                    </div>
                    <div
                        v-if="submitted && v$.form.repeatPassword.sameAsPassword.$invalid"
                        class="text-danger">
                        As suas senhas não conferem
                    </div>
                </div>
            </div>


                    <!-- <div class="text-danger">
                        <span v-if="submitted && !igualPassword() && !isUser">
                            As senhas não conferem
                        </span>
                    </div> -->

            <div class="mb-3">
                <button
                type="button"
                class="btn btn:hover btn-text col-12"
                @click="post()">
                Entrar
            </button>
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
    import { useVuelidate } from '@vuelidate/core'
    import { required, requiredIf, email, minValue,minLength, sameAs} from '@vuelidate/validators'
    import Swal from 'sweetalert2';

    export default {

        setup: () => ({ v$: useVuelidate() }),

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
                filledEmail: false,
                submitted: false,
                error: false,
                message: ''
                // services:[]
            }
        },
        validations() {
            return {
                form:{
                    email: {required, email},

                    name: {required: requiredIf(function(){
                        return this.filledEmail && !this.isUser
                    })},

                    age: {required: requiredIf(function(){
                        return this.filledEmail && !this.isUser
                    }),
                    minValue: minValue(1)
                    },

                    phone: {required: requiredIf(function(){
                        return this.filledEmail && !this.isUser
                    }),
                    minLenght: minLength(16)
                    },

                    repeatPassword: {required: requiredIf(function(){
                        return this.filledEmail && !this.isUser
                    }),
                    minLenght: minLength(8),
                    sameAsPassword:sameAs(this.form.password)
                    },

                    password: {required: requiredIf(function(){
                        return this.filledEmail
                    }),
                    minLenght: minLength(8),
                }
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

                if(!this.filledEmail)
                    this.getIsUser();

                if(this.filledEmail && this.isUser)
                    this.login();

                if(this.filledEmail && !this.isUser)
                    this.store();
            },
            store(){
                // sweetalert2 npm
                Swal.fire({
                    title: "Cadastrando Usuário..",
                    text: "Aguarde enquanto estamos cadastrando o usuário",
                    didOpen: () => {
                        Swal.showLoading()
                    }

                })
                axios({
                    method: 'post',
                    url: '/api/users',
                    data: this.form
                }).then((response) => {
                    if(response.data){
                        window.location.href = '/login';
                        Swal.close();

                    }
                });
            },
            login(){
                Swal.fire({
                    title: "Logando...",
                    text: "Aguarde enquanto estamos realizando o login",
                    didOpen: () => {
                        Swal.showLoading()
                    }

                })
                axios({
                    method: 'post',
                    url: '/api/authentication',
                    data: this.form
                }).then((response) => {
                    if(response.data.sucess){
                        window.location.href = '/';
                    }
                    this.error = true;
                    this.message = response.data.message;
                    Swal.close();
                });

            },
            getIsUser(){
                axios({
                    method: 'get',
                    url: '/api/user/is-user/' + this.form.email
                }).then((response)=>
                {
                   this.isUser          = response.data.sucess;
                   this.filledEmail     = true;
                   this.submitted       = false;
                })

            },

            // igualPassword(){
            //     return this.form.password == this.form.repeatPassword;
            // }

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

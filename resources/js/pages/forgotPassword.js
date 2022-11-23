import {createApp} from 'vue';
import ForgotPassword from '../components/ForgotPassword.vue';

const app = createApp({});
app.component('forgotPassword',ForgotPassword);
app.mount('#app');

import {createApp} from 'vue';
import ResetPassword from '../components/ResetPassword.vue';

const app = createApp({});
app.component('resetPassword',ResetPassword);
app.mount('#app');

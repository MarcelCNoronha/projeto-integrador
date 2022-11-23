import {createApp} from 'vue';
import CreateUser from '../components/CreateUser.vue';

const app = createApp({});
app.component('createUser',CreateUser);
app.mount('#app');

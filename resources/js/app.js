import './bootstrap';
import { createApp } from 'vue';
import LoginComponent from "./components/LoginComponent.vue";

const app = createApp(LoginComponent);
app.mount('#app');

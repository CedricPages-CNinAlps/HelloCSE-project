import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from 'vue';
import App from './App.vue';

import axios from 'axios';

const apiClient = axios.create({
    baseURL: '...',
});
export default apiClient;

window.Alpine = Alpine;

Alpine.start();

createApp(App)
    .mount('#app');

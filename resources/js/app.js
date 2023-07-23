import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from 'vue';
import App from './App.vue';

import axios from "axios";
axios.defaults.baseURL = 'http://localhost';

window.Alpine = Alpine;

Alpine.start();

createApp(App)
    .use('axios')
    .mount('#app');

import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from 'vue';
import App from './App.vue';

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

window.Alpine = Alpine;

Alpine.start();

createApp(App)
    .use('axios')
    .mount('#app');

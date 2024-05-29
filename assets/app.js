import './styles/app.css';

import { createApp } from 'vue';
import PrimeVue from 'primevue/config';

import Sidebar from './vue/sidebar.vue';

const app = createApp(Sidebar);
app.use(PrimeVue).mount('#sidebar');
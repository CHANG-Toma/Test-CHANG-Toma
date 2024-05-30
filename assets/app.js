import './styles/app.css';

import { createApp } from 'vue';
import PrimeVue from 'primevue/config';

import Sidebar from './vue/components/sidebar.vue';
import Content from './vue/components/content.vue';

const app = createApp({
    components: { Sidebar, Content },
    data() {
        return {
            isSidebarOpen: true
        };
    },
    methods: {
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen;
        }
    }
});

app.use(PrimeVue).mount('#app');
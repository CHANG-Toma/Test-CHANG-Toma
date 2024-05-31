import './styles/app.css';

import { createApp } from 'vue';
import PrimeVue from 'primevue/config';

import Sidebar from './vue/components/sidebar.vue'; // Import le composant Sidebar
import Content from './vue/components/content.vue'; // Import le composant Content

// Crée une application Vue pour générer le site
const app = createApp({
    components: { Sidebar, Content },
    data() {
        return {
            isSidebarOpen: true // Initialisation de la variable isSidebarOpen
        };
    },
    methods: {
        toggleSidebar() {
            this.isSidebarOpen = !this.isSidebarOpen; // Inverse la valeur de isSidebarOpen
        }
    }
});

// Utilise PrimeVue pour les composants Vue
app.use(PrimeVue).mount('#app');
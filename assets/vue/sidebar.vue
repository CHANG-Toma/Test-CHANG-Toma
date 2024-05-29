<template>
    <div class="flex h-screen flex-col bg-white shadow-xl transition-all duration-300 ease-in-out"
        :class="{ 'w-[18rem]': isOpen, 'w-[5rem]': !isOpen }">

        <div class="flex items-center justify-between p-4 bg-gray-200">
            <div v-show="isOpen" class="logo">
                <img src="../svg/logo.svg" alt="Logo" />
            </div>
            <button @click="toggleSidebar" class="text-blue-gray-700 hover:text-blue-gray-900 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <nav class="flex-grow flex flex-col justify-between p-2 text-base font-normal text-blue-gray-700">
            <div>
                <a href="#"
                    class="group flex items-center gap-2 p-2 rounded-md hover:bg-blue-gray-50 transition-colors">
                    <img src="../svg/user.svg" alt="User" class="nav-icon" />
                    <span v-show="isOpen">Liste des utilisateurs</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2 p-2 rounded-md hover:bg-blue-gray-50 transition-colors">
                    <img src="../svg/estimate.svg" alt="estimate" class="nav-icon" />
                    <span v-show="isOpen">Devis</span>
                </a>
            </div>

            <div class="p-4 mt-4 border-t-2 border-gray-300">
                <a href="/logout"
                    class="group flex items-center gap-2 p-2 rounded-md hover:bg-blue-gray-50 transition-colors">
                    <img src="../svg/logout.svg" alt="logout" class="logout-icon" />
                    <span v-show="isOpen">Se déconnecter</span>
                </a>
            </div>
        </nav>
    </div>
</template>


<style scoped>
.logo img {
    width: 6rem;
    height: 6rem;
}

.nav-icon,
.logout-icon {
    width: 28px;
    height: 28px;
}
</style>


<script>
export default {
    name: 'Sidebar',
    data() {
        return {
            isOpen: true // État initial de la sidebar
        };
    },
    methods: {
        toggleSidebar() {
            this.isOpen = !this.isOpen; // Bascule l'état de la sidebar
        }
    }
}
</script>

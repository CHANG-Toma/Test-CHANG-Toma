<template>
    <div class="flex h-screen flex-col bg-white shadow-xl transition-all duration-300 ease-in-out absolute top-0 left-0 z-50"
        :class="{ 'w-[4rem]': isOpen, 'w-[18rem]': !isOpen }">

        <!-- Header area with the burger menu and logo -->
        <div class="flex items-center justify-between bg-white px-4 py-2" :class="{'mt-9': isOpen}">
            <!-- Placeholder for logo when sidebar is open -->
            <div v-show="!isOpen" class="logo">
                <a href="https://www.lamusee.paris">
                    <img src="../svg/logo.svg" alt="Logo" />
                </a>
            </div>

            <!-- Burger menu button -->
            <button @click="toggleSidebar" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Navigation items -->
        <nav class="flex-grow flex flex-col justify-between p-2 text-base font-normal text-gray-700":class="{'mt-9': isOpen}">
            <div>
                <a href="/users"
                    class="group flex items-center gap-2 p-2 rounded-md hover:bg-gray-100 transition-colors mb-2">
                    <img src="../svg/user.svg" alt="User" class="nav-icon" />
                    <span v-show="!isOpen">Liste des utilisateurs</span>
                </a>
                <a href="#"
                    class="group flex items-center gap-2 p-2 rounded-md hover:bg-gray-100 transition-colors mn-2">
                    <img src="../svg/estimate.svg" alt="estimate" class="nav-icon" />
                    <span v-show="!isOpen">Devis</span>
                </a>
            </div>

            <!-- Logout link -->
            <div class="mt-4 border-t-2 border-gray-300":class="{'mt-9': isOpen}">
                <a href="/logout"
                    class="group flex items-center gap-2 p-2 rounded-md hover:bg-gray-100 transition-colors">
                    <img src="../svg/logout.svg" alt="logout" class="logout-icon" />
                    <span v-show="!isOpen">Se déconnecter</span>
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

.nav-icon:hover,
.logout-icon:hover {
    filter: brightness(75%);
}

</style>

<script>
export default {
    name: 'Sidebar',
    data() {
        return {
            isOpen: true
        };
    },
    methods: {
        toggleSidebar() {
            this.isOpen = !this.isOpen;
            this.$emit('toggle-sidebar');
        }
    }
}
</script>

<template>
    <div :class="{ 'ml-4': isSidebarOpen, 'ml-18': !isSidebarOpen }" class="transition-all duration-300 ease-in-out">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'Content',
    props: {
        isSidebarOpen: {
            type: Boolean,
            required: true
        }
    }
}
</script>

<style scoped>
.ml-4 {
    margin-left: 4rem;
}
.ml-18 {
    margin-left: 18rem;
}
</style>

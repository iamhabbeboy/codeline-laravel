<template>
    <div id="app">
        Welcome to homepage
        <router-link to="/films">View Films </router-link>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<template>
    <div>
        <h1 class="py-8 text-5xl font-bold text-center">
            Profil Browser
        </h1>
        <Profile />
    </div>
</template>

<script>
import Profile from "./components/Profile.vue";

export default {
    name: "App",
    components: {Profile},
}
</script>

<style scoped>

</style>

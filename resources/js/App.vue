<template>
    <div>
        <h1 class="py-8 text-5xl font-bold text-center">
            Profil Browser
        </h1>
        <Test />
        <Profile />
    </div>
</template>

<script>
import Profile from "./components/Profile.vue";
import axios from "axios";
import Test from "./components/Test.vue";

export default {
    name: "App",
    components: {Test, Profile},
}
</script>

<style scoped>

</style>

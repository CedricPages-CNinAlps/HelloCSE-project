<template>
        <div class="container flex flex-wrap">
            <div class="names w-full sm:w-1/4 p-4">
                <!-- La liste des noms -->
                <ul>
                    <li
                        v-for="name in starsaxios"
                        :key="name.id"
                        @click="selectName(name)"
                        class="cursor-pointer"
                    >
                        {{ name.lastname }} {{ name.firstname }}
                    </li>
                </ul>
            </div>
            <div class="info w-full sm:w-3/4 p-4">
                <!-- L'emplacement pour afficher les informations liées au nom sélectionné -->
                <div v-if="selectedName" class="info-content">
                    <img
                        class="float-left"
                        :src="selectedName.image"
                        style="width: 150px"
                    />
                    <h2 class="py-8 text-3xl font-bold">
                        {{ selectedName.firstname }} {{ selectedName.lastname }}
                    </h2>
                    <p>{{ selectedName.description }}</p>
                </div>
                <div v-else>
                    <p>Sélectionnez un nom pour afficher les informations</p>
                </div>
            </div>
        </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Profile",
    data() {
        return {
            starsaxios: {},
            selectedName: null,
        }
    },
    methods: {
        selectName(name) {
            this.selectedName = name;
        },
        getResult() {
            axios.get('/data/starsList')
                .then((response) => {
                    this.starsaxios = response.data
                })
                .catch((error) => {
                    console.log("error", error.response.data);
                });
        },
    },
    created() {
        this.getResult()
    },
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;
}
</style>

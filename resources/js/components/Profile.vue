<template>
    <div class="flex-wrap">
        <ul role="list" class="p-6 divide-y divide-slate-200">
            <li class="cursor-pointer flex py-4"
                v-for="name in starsaxios"
                :key="name.id"
                @click="toggleNameContent(name)">
                <div class="ml-3 overflow-clip sm:w-1/6" >
                    <p class="text-sm font-medium">{{ name.firstname }} {{ name.lastname }}</p>
                </div>
                <div v-if="selectedName && (name.lastname == selectedName.lastname)"
                     class="sm:w-3/4 bg-white overflow-hidden md:max-w-2xl">
                    <div class="md:flex">
                        <img class="float-left border-4 mr-6 h-36 md:h-full md:w-48 shadow-md" :src="selectedName.image"
                             :alt="selectedName.firstname + ' ' +selectedName.lastname">
                        <div class="tracking-wide text-xl text-black font-semibold">
                            {{ selectedName.firstname }} {{ selectedName.lastname }}
                        </div>
                        <p class="mt-2 text-slate-500">{{ selectedName.description }}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Profile",
    data() {
        return {
            starsaxios: [],
            selectedName: null,
        }
    },
    methods: {
        toggleNameContent(name) {
            if (this.selectedName && this.selectedName.lastname === name.lastname) {
                this.selectedName = null;
            } else {
                this.selectedName = name;
            }
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
        this.getResult();
    },
}
</script>

<style scoped>
.cursor-pointer {
    cursor: pointer;
}
</style>

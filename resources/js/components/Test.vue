<template>
    <div class="container flex">
        <div class="names w-1/4 p-4">
            <!-- La liste des noms -->
            <ul>
                <li v-for="name in names" :key="name" @click="selectName(name)" class="cursor-pointer">{{ name }}</li>
            </ul>
        </div>
        <div class="info w-3/4 p-4">
            <!-- L'emplacement pour afficher les informations liées au nom sélectionné -->
            <div v-if="selectedName" class="info-content">
                <h2>{{ selectedName }}</h2>
                <!-- Afficher les informations liées au nom sélectionné ici -->
            </div>
            <div v-else>
                <p>Sélectionnez un nom pour afficher les informations</p>
            </div>
        </div>
    </div>
</template>

<script setup>
export default {
    data() {
        return {
            names: ["Nom 1", "Nom 2", "Nom 3", /* Ajoutez d'autres noms ici */],
            selectedName: null,
        };
    },
    methods: {
        selectName(name) {
            // Mettre à jour le nom sélectionné
            this.selectedName = name;
            // Vous pouvez également ajouter ici la logique pour récupérer les informations liées au nom sélectionné
        },
    },
};
</script>

<style scoped>
.container {
    min-height: 500px; /* Ajustez la hauteur selon vos besoins */
}
.names {
    /* Styles souhaités pour la colonne de gauche */
}
.info {
    /* Styles souhaités pour la colonne de droite */
}
/* Style pour les noms dans la liste */
.cursor-pointer {
    cursor: pointer;
}
</style>

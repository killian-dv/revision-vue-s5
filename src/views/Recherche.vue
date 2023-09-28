<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { RouterLink } from "vue-router";

let searchword = ref("");
let data = ref("");
let error = ref(null);

async function search() {
  if (searchword.value) {
    try {
      const response = await axios.get(
        `https://restcountries.com/v3.1/name/${searchword.value}`
      );
      data.value = response.data;
      error.value = null;
    } catch (e) {
      if (e.response && e.response.status === 404) {
        data.value = [];
        error.value = "Aucun pays trouvé";
      } else {
        error.value = "Une erreur s'est produite lors de la recherche.";
      }
    }
  } else {
    data.value = [];
    error.value = null;
  }
}

onMounted(search);
</script>

<template>
  <h1>Recherche</h1>
  <div class="container">
    <div class="searchbar">
      <input v-model="searchword" placeholder="rechercher" @input="search" />
      <button @click="search">Rechercher</button>
    </div>
    <ul v-if="data.length > 0">
      <li v-for="pays in data" :key="pays.name.common">
        <RouterLink :to="`/pays/${pays.name.common}`">
          {{ pays.flag }} {{ pays.name.common }}
        </RouterLink>
      </li>
    </ul>
    <p v-else-if="error">{{ error }}</p>
    <p v-else>Aucun résultat trouvé.</p>
  </div>
</template>

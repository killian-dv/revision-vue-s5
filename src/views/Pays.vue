<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { RouterLink } from "vue-router";

let data = ref("");
let listeDepart = ref("");
let search = ref("");

onMounted(async () => {
  const response = await axios.get("https://restcountries.com/v3.1/all");
  data.value = response.data;
  listeDepart.value = data.value;
});

function filter() {
  // data.value = data.value.filter(pays => pays.name.common.toLowerCase().includes(search.value.toLowerCase()))
  data.value = listeDepart.value.filter(function (unpays) {
    return unpays.name.common
      .toLowerCase()
      .includes(search.value.toLowerCase());
  });
}
</script>

<template>
  <input v-model="search" placeholder="rechercher" @input="filter" />
  <button @click="filter">Rechercher</button>
  <hr />
  <ul v-if="data">
    <li v-for="pays in data">
      <RouterLink :to="`/pays/${pays.name.common}`">
        {{ pays.flag }} {{ pays.name.common }}
      </RouterLink>
    </li>
  </ul>
</template>

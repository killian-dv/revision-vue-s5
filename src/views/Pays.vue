<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { RouterLink } from "vue-router";

let data = ref("");
let listeDepart = ref("");
let search = ref("");

onMounted(async () => {
  const response = await axios.get("../../php/countries.json");
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
  <div class="container">
    <div class="searchbar">
      <input v-model="search" placeholder="rechercher" @input="filter" />
      <button @click="filter">Rechercher</button>
    </div>
    <ul v-if="data">
      <li v-for="pays in data">
        <RouterLink :to="`/pays/${pays.name.common}`">
          {{ pays.flag }} {{ pays.name.common }}
        </RouterLink>
      </li>
    </ul>
  </div>
</template>

<style>
.container {
  padding: 2rem;
}
.searchbar {
  display: flex;
  flex-direction: row;
  gap: 0.5rem;
  margin-bottom: 2rem;
}
.searchbar input {
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  width: 300px;
}
.searchbar button {
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  background-color: #ccc;
}
.searchbar button:hover {
  background-color: #ddd;
  cursor: pointer;
}
</style>

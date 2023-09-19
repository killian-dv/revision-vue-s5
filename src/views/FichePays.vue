<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRoute } from "vue-router";

const route = useRoute();
console.log(route);

const pays = route.params.pays;
console.log(pays);
let data = ref("");

onMounted(async () => {
  const response = await axios.get(
    "https://restcountries.com/v3.1/name/" + pays
  );
  data.value = response.data;
});
</script>

<template>
  <div v-if="data">
    <h1>{{ data[0].name.common }}</h1>
    <img :src="data[0].flags.png" :alt="data[0].name.common" />
    <p>Capital: {{ data[0].capital[0] }}</p>
    <p>Population: {{ data[0].population }}</p>
    <p>Region: {{ data[0].region }}</p>
    <p>Subregion: {{ data[0].subregion }}</p>
    <p>Area: {{ data[0].area }} km²</p>
  </div>
</template>

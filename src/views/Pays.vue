<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { RouterLink } from "vue-router";

let data = ref("");

onMounted(async () => {
  const response = await axios.get("https://restcountries.com/v3.1/all");
  data.value = response.data;
});
console.log(data);
</script>

<template>
  <ul v-if="data">
    <li v-for="pays in data">{{ pays.flag }} {{ pays.name.common }}</li>
  </ul>
  <pre>
    {{ data }}
  </pre>
</template>

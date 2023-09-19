<script setup>
import { ref } from "vue";

const awesome = ref(true);

const notes = [12, 8, 10, 14, 6, 9, 7, 13, 11, 15];
</script>

<template>
  <button @click="awesome = !awesome">Basculer</button>

  <h1 v-if="awesome">Vue est magnifique!</h1>
  <h1 v-else>Oh non 😢</h1>
  <div v-for="note in notes">
    <p v-if="note > 10" class="green">{{ note }} supérieur à 10</p>
    <p v-else-if="note <= 10 && note >= 8" class="red">
      {{ note }} entre 8 et 10
    </p>
    <p v-else class="red">{{ note }} inférieur 10</p>
  </div>
</template>

<style scoped></style>

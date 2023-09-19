<script setup>
import FirstComponent from "./components/FirstComponent.vue";
import { computed } from "vue";

const note1 = 18;
const note2 = 16;
const note3 = 13;

const table = ["note1", "note2", "note3"];

const moyenne = computed(() => {
  return (note1 + note2 + note3) / 3;
});
</script>

<template>
  <h1>Exo 1</h1>
  <ul>
    <li>Note 1 : {{ note1 }}</li>
    <li>Note 2 : {{ note2 }}</li>
    <li>Note 3 : {{ note3 }}</li>
  </ul>
  <p>Moyenne : {{ moyenne }}</p>
  <ul v-for="item in table">
    <li>{{ item }}</li>
  </ul>
  <p>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga dolor, cum
    nobis veritatis numquam ad laborum eum architecto, nulla rerum autem commodi
    harum, unde consequuntur ipsum perspiciatis. Nesciunt ducimus necessitatibus
    ea. Eius eum obcaecati eligendi eos aut atque provident quaerat quos
    pariatur? Tempore dolores saepe, eos minus deserunt ut nesciunt?
  </p>
  <FirstComponent />
</template>

<style scoped></style>

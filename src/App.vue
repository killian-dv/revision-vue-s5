<script setup>
import { RouterLink } from "vue-router";
</script>

<template>
  <header>
    <RouterLink to="/">Home</RouterLink>
    <RouterLink to="/pays">Pays</RouterLink>
  </header>

  <router-view></router-view>
</template>

<style scoped>
header {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 1rem;
  background-color: #f5f5f5;
}
</style>

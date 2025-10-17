<script setup>

  import { RouterView } from 'vue-router';

</script>

<template>

  <nav>
    <RouterLink to="/auth/register">Register</RouterLink>
    <RouterLink to="/auth/login">Login</RouterLink>
  </nav>
  <main>
    <RouterView />
  </main>

</template>

<style scoped></style>

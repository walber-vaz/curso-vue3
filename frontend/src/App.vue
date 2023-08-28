<script setup lang="ts">
import HeaderComponent from '@/components/HeaderComponent.vue'
import { ref } from 'vue'
import { RouterLink, RouterView } from 'vue-router'

const count = ref(0)
const increment = () => count.value++
</script>

<template>
  <header class="header">
    <HeaderComponent />
    <nav class="nav">
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
    </nav>
  </header>

  <button type="button" @click="increment">count is: {{ count }}</button>
  <RouterView class="content" />
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');
</style>

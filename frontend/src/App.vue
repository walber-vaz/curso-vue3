<script lang="ts">
import HeaderComponent from '@/components/HeaderComponent.vue'
import { RouterLink, RouterView } from 'vue-router'

export default {
  components: {
    HeaderComponent,
    RouterLink,
    RouterView
  },
  data() {
    return {
      count: 0
    }
  },
  methods: {
    increment() {
      this.count++
    }
  }
}
</script>

<template>
  <header class="header">
    <HeaderComponent />
    <nav class="nav">
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
    </nav>
  </header>

  <button @click="increment">count is: {{ count }}</button>
  <RouterView class="content" />
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');
</style>

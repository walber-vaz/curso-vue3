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
  },

  // mounted -> ele é executado depois que o DOM é montado
  mounted() {
    console.log('App.vue mounted')
  },

  // created -> ele é executado antes do DOM ser montado
  created() {
    console.log('App.vue created')
  },

  // destroyed -> ele é executado quando o componente é destruido
  unmounted() {
    console.log('App.vue destroyed')
  },

  // updated -> ele é executado quando o componente é atualizado
  updated() {
    console.log('App.vue updated')
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

<script setup lang="ts">
import HeaderComponent from '@/components/HeaderComponent.vue'
import {
  onBeforeMount,
  onBeforeUpdate,
  onErrorCaptured,
  onMounted,
  onUnmounted,
  onUpdated,
  reactive,
  ref
} from 'vue'
import { RouterLink, RouterView } from 'vue-router'

const count = ref(0)
const show = ref(false)
const users = reactive([
  { id: 1, name: 'John' },
  { id: 2, name: 'Mary' },
  { id: 3, name: 'Steve' }
])
const increment = () => count.value++

// onMounted -> Ele é executado quando o componente é montado no DOM
onMounted(() => {
  console.log('Componente montado')
})

// onBeforeMount -> Ele é executado antes do componente ser montado no DOM
onBeforeMount(() => {
  console.log('Componente antes de ser montado')
})

// onBeforeUpdate -> Ele é executado antes do componente ser atualizado
onBeforeUpdate(() => {
  console.log('Componente antes de ser atualizado')
})

// onUpdated -> Ele é executado quando o componente é atualizado
onUpdated(() => {
  console.log('Componente atualizado')
})

// onUnmounted -> Ele é executado quando o componente é desmontado do DOM
onUnmounted(() => {
  console.log('Componente desmontado')
})

// onErrorCaptured -> Ele é executado quando ocorre um erro no componente
onErrorCaptured(() => {
  console.log('Componente com erro')
})
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
  <button type="button" @click="show = !show">show is: {{ show }}</button>

  <h2>Users</h2>
  <!-- Usando reactive -->
  <ul v-if="show">
    <li v-for="user in users" :key="user.id">
      {{ user.name }}
    </li>
  </ul>
  <RouterView class="content" />
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');
</style>

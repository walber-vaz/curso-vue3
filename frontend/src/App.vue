<script setup lang="ts">
import { reactive } from 'vue'
import { RouterLink, RouterView } from 'vue-router'

const users = reactive([
  {
    id: 1,
    name: 'John Doe',
    age: 25,
    email: 'email@email.com',
    role: ['admin']
  },
  {
    id: 2,
    name: 'Jane Doe',
    age: 24,
    email: 'email@email.com',
    role: ['user']
  },
  {
    id: 3,
    name: 'John Smith',
    age: 26,
    email: 'email@email.com',
    role: ['user']
  }
])
</script>

<template>
  <header class="header">
    <nav class="nav">
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
    </nav>
  </header>

  <section>
    <h1>Users</h1>
    <ul>
      <li v-for="user in users" :key="user.id">
        <span v-if="user.role.includes('admin')">👑</span>
        <strong style="font-weight: bold"
          >{{ user.name }} - {{ user.age }} - {{ user.email }}</strong
        >
      </li>
    </ul>
  </section>
  <RouterView class="content" />
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');
</style>

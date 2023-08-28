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

  <RouterView class="content" />
  <section class="section-user">
    <h1>Users</h1>
    <ul>
      <li v-for="user in users" :key="user.id">
        <span v-if="user.role.includes('admin')">👑</span>
        <strong>{{ user.name }} - {{ user.age }} - {{ user.email }}</strong>
      </li>
    </ul>
  </section>
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');

.section-user {
  margin-top: 2rem;
  max-height: 96rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  h1 {
    font-size: 3.5rem;
    font-weight: bold;
    color: #111;
    margin-bottom: 1rem;
  }

  ul {
    display: flex;
    max-width: 96rem;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 2rem;

    li {
      font-size: 2rem;
      font-weight: bold;
      color: #111;
      transition: color 0.2s ease-in-out;

      &:hover {
        color: #41b883;
        cursor: pointer;
      }

      strong {
        margin-left: 1rem;
        font-weight: bold;
      }
    }
  }
}
</style>

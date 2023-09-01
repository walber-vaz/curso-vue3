<script setup lang="ts">
import { reactive } from 'vue'
import { RouterLink, RouterView } from 'vue-router'

const users = reactive([
  {
    id: 1,
    name: 'John Doe',
    age: 25,
    email: 'email@email.com',
    role: ['admin'],
    img: 'https://ui-avatars.com/api/?rounded=true&background=random&size=96&bold=true'
  },
  {
    id: 2,
    name: 'Jane Doe',
    age: 24,
    email: 'email@email.com',
    role: ['user'],
    img: 'https://ui-avatars.com/api/?rounded=true&background=random&size=96&bold=true'
  },
  {
    id: 3,
    name: 'John Smith',
    age: 26,
    email: 'email@email.com',
    role: ['user'],
    img: 'https://ui-avatars.com/api/?rounded=true&background=random&size=96&bold=true'
  }
])

const addTooltip = (user: any) => {
  user.showTooltip = true
}

const removeTooltip = (user: any) => {
  user.showTooltip = false
}

const addUser = () => {
  const name = document.getElementById('name') as HTMLInputElement
  const newUser = {
    id: users.length + 1,
    name: name.value,
    age: 32,
    email: 'email@email.com',
    role: ['user'],
    img: 'https://ui-avatars.com/api/?rounded=true&background=random&size=96&bold=true'
  }

  users.push(newUser)
  name.value = ''
}
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
        <img :src="user.img" :alt="user.name" />
        <strong
          :class="{ isAdmin: user.role.includes('admin') }"
          @mouseover="addTooltip(user)"
          @mouseleave="removeTooltip(user)"
          >{{ user.name }} - {{ user.age }} - {{ user.email }}</strong
        >
        <div v-if="user.showTooltip" class="tooltip">
          {{ user.role.includes('admin') ? 'Admin' : 'User' }}
        </div>
      </li>
    </ul>
    <input type="text" placeholder="Nome" name="name" id="name" />
    <button class="btn" type="button" @click="addUser()">Adicionar</button>
  </section>
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');
</style>

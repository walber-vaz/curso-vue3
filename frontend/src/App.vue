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
  </section>
</template>

<style lang="scss">
@import url('@/assets/scss/app.scss');

@keyframes tooltipAnimation {
  0% {
    opacity: 0;
    transform: translateY(-1rem);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.tooltip {
  position: absolute;
  top: 4rem;
  left: 8rem;
  background-color: #41b883;
  color: #111;
  padding: 0.5rem;
  border-radius: 0.5rem;
  font-size: 1.5rem;
  font-weight: bold;
  transition: opacity 0.3s ease-in-out;
  opacity: 0;
  pointer-events: none;
  z-index: 1;
}

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
      position: relative;
      display: flex;
      align-items: center;
      font-size: 2rem;
      font-weight: bold;
      color: #111;
      transition: color 0.2s ease-in-out;

      &:hover {
        color: #41b883;
        cursor: pointer;
      }

      &:hover .tooltip {
        opacity: 1;
        pointer-events: all;
        animation: tooltipAnimation 0.6s ease-in-out forwards;
        animation-iteration-count: 1;
      }

      img {
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
        margin-left: 1rem;
      }

      strong {
        margin-left: 1rem;
        font-weight: bold;
      }
    }
  }
}

.isAdmin {
  color: #41b883;
  transition: color 0.2s ease-in-out;

  &:hover {
    color: #111;
  }
}
</style>

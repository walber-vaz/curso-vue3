<template>
  <nav>
    <li><RouterLink to="/">Home</RouterLink></li>
    <li><RouterLink to="/user/create">Create User</RouterLink></li>
  </nav>
</template>

<script lang="ts">
import { RouterLink } from 'vue-router'
export default {
  name: 'NavComponent',
  components: {
    RouterLink
  }
}
</script>

<style scoped>
nav {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 2rem;
  margin-bottom: 2rem;
}

nav li {
  font-size: 1.5rem;
  font-weight: bold;
  color: #111;
  list-style: none;
  transition: color 0.2s ease-in-out;
}

nav li:hover {
  color: #41b883;
  cursor: pointer;
}

nav li.active {
  color: #41b883;
}

nav li.active:hover {
  color: #111;
}

nav li a {
  text-decoration: none;
  color: inherit;
  font-size: inherit;
}

nav li a:hover {
  color: inherit;
  font-size: inherit;
}

nav li a.active {
  color: inherit;
  font-size: inherit;
}

nav li a.active:hover {
  color: inherit;
  font-size: inherit;
}
</style>

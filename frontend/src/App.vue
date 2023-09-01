<template>
  <NavComponent />
  <RouterView class="content" />
</template>

<script lang="ts">
import NavComponent from '@/components/NavComponent.vue'
import { RouterView } from 'vue-router'

export default {
  components: {
    RouterView,
    NavComponent
  },

  data() {
    return {}
  }
}
</script>

<style lang="scss">
@import url('@/assets/scss/app.scss');

.section-user {
  margin-top: 2rem;
  max-height: 96rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.section-user ul {
  display: flex;
  max-width: 96rem;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 2rem;
}

.section-user h1 {
  font-size: 3.5rem;
  font-weight: bold;
  color: #111;
  margin-bottom: 1rem;
}

.section-user li {
  font-size: 2rem;
  font-weight: bold;
  color: #111;
  transition: color 0.2s ease-in-out;
}

.section-user li:hover {
  color: #41b883;
  cursor: pointer;
}
</style>

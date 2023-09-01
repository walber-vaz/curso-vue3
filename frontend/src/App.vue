<template>
  <NavComponent />
  <RouterView class="content" />
</template>

<script setup lang="ts">
import NavComponent from '@/components/NavComponent.vue'
import { RouterView } from 'vue-router'
</script>

<style lang="scss">
@import url('@/assets/scss/app.scss');
</style>

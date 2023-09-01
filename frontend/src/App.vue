<script setup lang="ts">
import { reactive, ref } from 'vue'
import { RouterLink, RouterView } from 'vue-router'

// // onMounted -> Ele é executado quando o componente é montado no DOM
// onMounted(() => {
//   console.log('Componente montado')
// })

// // onBeforeMount -> Ele é executado antes do componente ser montado no DOM
// onBeforeMount(() => {
//   console.log('Componente antes de ser montado')
// })

// // onBeforeUpdate -> Ele é executado antes do componente ser atualizado
// onBeforeUpdate(() => {
//   console.log('Componente antes de ser atualizado')
// })

// // onUpdated -> Ele é executado quando o componente é atualizado
// onUpdated(() => {
//   console.log('Componente atualizado')
// })

// // onUnmounted -> Ele é executado quando o componente é desmontado do DOM
// onUnmounted(() => {
//   console.log('Componente desmontado')
// })

// // onErrorCaptured -> Ele é executado quando ocorre um erro no componente
// onErrorCaptured(() => {
//   console.log('Componente com erro')
// })
// const users: IUser[] = reactive([])

// onMounted(async () => {
//   try {
//     const { data } = await fetchApi.get<IUser[]>('users')
//     const sorted = data.sort((a, b) => a.firstname.localeCompare(b.firstname))
//     users.push(...sorted)
//   } catch (error) {
//     if (error instanceof Error) {
//       console.log(error.message)
//     }
//   }
// })
const users = reactive([
  {
    id: 1,
    firstname: 'Walber'
  },
  {
    id: 2,
    firstname: 'W2k'
  }
])
const username = ref('Walber')
</script>

<template>
  <header class="header">
    <nav class="nav">
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
    </nav>
  </header>

  <RouterView class="content" />
  <!-- <section class="section-user">
    <h1>Users</h1>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.firstname }}
      </li>
    </ul>
  </section> -->
  <input type="text" v-model="username" />

  <template v-for="user in users" :key="user.id">
    <input
      type="checkbox"
      @click="username === user.firstname"
      :checked="username === user.firstname"
    />
    {{ user.firstname }}
  </template>

  <select name="" id="" v-model="username">
    <option v-for="user in users" :key="user.id" :value="user.firstname">
      {{ user.firstname }}
    </option>
  </select>
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

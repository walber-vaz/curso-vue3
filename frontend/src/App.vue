<script lang="ts">
import type { IUser } from '@/types/IUser'
import { fetchApi } from '@/utils/fetchApi'
import { RouterLink, RouterView } from 'vue-router'

export default {
  components: {
    RouterLink,
    RouterView
  },
  // data() {
  //   return {
  //     count: 0,
  //     show: false,
  //     users: [
  //       {
  //         id: 1,
  //         name: 'John Doe'
  //       },
  //       {
  //         id: 2,
  //         name: 'Jane Doe'
  //       }
  //     ]
  //   }
  // },
  // methods: {
  //   increment() {
  //     this.count++
  //   }
  // },
  // // mounted -> ele é executado depois que o DOM é montado
  // mounted() {
  //   console.log('App.vue mounted')
  // },
  // // created -> ele é executado antes do DOM ser montado
  // created() {
  //   console.log('App.vue created')
  // },
  // // destroyed -> ele é executado quando o componente é destruido
  // unmounted() {
  //   console.log('App.vue destroyed')
  // },
  // // updated -> ele é executado quando o componente é atualizado
  // updated() {
  //   console.log('App.vue updated')
  // }
  data() {
    return {
      users: [] as IUser[]
    }
  },

  async mounted() {
    try {
      const { data } = await fetchApi.get<IUser[]>('/users')
      this.users = data.sort((a: IUser, b: IUser) => a.firstname.localeCompare(b.firstname))
    } catch (error) {
      if (error instanceof Error) {
        console.log(error.message)
      }
    }
  }
}
</script>

<template>
  <header class="header">
    <nav class="nav">
      <RouterLink to="/">Home</RouterLink>
      <RouterLink to="/about">About</RouterLink>
    </nav>
  </header>

  <!-- <button @click="increment">count is: {{ count }}</button>
  <button @click="show = !show">show is: {{ show }}</button>

  <div v-if="show">
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.name }}
      </li>
    </ul>
  </div> -->

  <RouterView class="content" />
  <section class="section-user">
    <h1>Users</h1>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.firstname }}
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

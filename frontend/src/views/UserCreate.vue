<template>
  <form @submit.prevent="create" action="">
    <input type="text" placeholder="First Name" v-model="user.firstName" />
    <small v-if="errors['errors'].firstName" class="error">{{
      errors['errors'].firstName[0]
    }}</small>

    <input type="text" placeholder="Last Name" v-model="user.lastName" />
    <small v-if="errors['errors'].firstName" class="error">{{
      errors['errors'].lastName[0]
    }}</small>
    <input type="email" placeholder="Email" v-model="user.email" />
    <small v-if="errors['errors'].email" class="error">{{ errors['errors'].email[0] }}</small>

    <input type="password" placeholder="Password" v-model="user.password" />
    <small v-if="errors['errors'].password" class="error">{{ errors['errors'].password[0] }}</small>

    <button type="submit">Create</button>
  </form>
</template>

<script setup lang="ts">
import type { User } from '@/types/IUser'
import { fetchApi } from '@/utils/fetchApi'
import { reactive } from 'vue'

const user = reactive({}) as User
const errors = reactive({ errors: {} }) as { errors: Record<string, string[]> }

const create = async () => {
  try {
    const { data } = await fetchApi.post('/user', user)
    console.log(data)
  } catch (error: any) {
    errors['errors'] = error.response.data.errors
  }
}
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  max-width: 96rem;
  margin: 0 auto;
}

form input {
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  font-size: 1rem;
}

form button {
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  font-size: 1rem;
  background-color: #41b883;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

form button:hover {
  background-color: #3da566;
}

form button:active {
  background-color: #3da566;
}

form button:focus {
  outline: none;
}

form button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

form button:disabled:hover {
  background-color: #ccc;
}

form button:disabled:active {
  background-color: #ccc;
}

.error {
  color: red;
  font-size: 0.75rem;
  font-family: sans-serif;
}
</style>

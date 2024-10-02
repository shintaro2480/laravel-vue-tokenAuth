// plugins/axios.ts
import axios from 'axios'

export default defineNuxtPlugin(() => {
  const api = axios.create({
    baseURL: useRuntimeConfig().public.baseURL
  })

  return {
    provide: {
      axios: api
    }
  }
})

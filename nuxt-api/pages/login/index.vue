<template>
  <v-row>
    <v-col class="text-center">
      <v-text-field label="email" v-model="email"></v-text-field>
      <v-text-field label="password" v-model="password"></v-text-field>
      <v-btn @click="login" color="blue" outlined>ログイン</v-btn>
    </v-col>
  </v-row>
</template>

<script setup>
import { ref } from 'vue'
import { useRuntimeConfig } from '#app'

// emailとpasswordを管理するためのreactive変数を定義
const email = ref('')
const password = ref('')

// 環境変数からAPIベースURLを取得
const config = useRuntimeConfig()

// ログイン処理
const login = async () => {
  console.log("おした")

  try {
    // fetchを使ってPOSTリクエストを実行し、JSON形式でデータを送信
    const response = await fetch(`${config.public.apiBaseUrl}/api/login`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        email: email.value,
        password: password.value,
      }),
    })

    // レスポンスの処理
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`)
    }

    const data = await response.json()
    console.log("ログイン成功:", data)

  } catch (error) {
    console.error("エラーが発生しました:", error)
  }
}
</script>
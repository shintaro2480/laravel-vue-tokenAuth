import '@nuxt/types';

declare module '@nuxt/types' {
  interface NuxtConfig {
    auth?: any; // authの設定をここに追加
  }
}
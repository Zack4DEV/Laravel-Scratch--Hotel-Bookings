import { createPinia } from 'pinia';
// types
import type { App } from 'vue';

export const store = createPinia();


export default function setupStore(app: App) {
  app.use(store);
}
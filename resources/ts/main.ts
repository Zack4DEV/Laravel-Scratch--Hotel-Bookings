import './bootstrap';
import { createApp } from "vue"
import { defineComponent } from 'vue';
import { setupPageStackRouter } from "./router/pageStack";
import { setupVant } from './registerVant';

import setupRouter from "./router";
import setupStore from "./store";


import './styles/index.less';

import App from "./App.vue";

// Create vue app
const app = createApp(App);


// Use plugins
setupRouter(app)
setupPageStackRouter(app)
setupStore(app)
setupVant(app)

// Mount vue app
app.mount("#app")

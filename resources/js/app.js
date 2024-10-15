import './bootstrap';

import { createApp } from 'vue';
const app = createApp({});

import Index from './components/Index.vue';
app.component('index', Index);

import router from './router';
app.use(router);

app.mount('#app');
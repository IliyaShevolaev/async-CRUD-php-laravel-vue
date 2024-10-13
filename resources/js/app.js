import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import MainComponent from './components/MainComponent.vue';
app.component('main-component', MainComponent);


app.mount('#app');

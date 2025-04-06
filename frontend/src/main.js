import { createApp, provide } from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8000/api';

const app = createApp(App);

app.provide('$axios', axios);

app.use(router);
app.mount('#app');
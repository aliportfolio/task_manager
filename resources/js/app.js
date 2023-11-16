import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import Components
import App from './components/App.vue';
import Register from "./components/Auth/Register.vue";
import Login from "./components/Auth/Login.vue";
import ShowTasks from "./components/Tasks/ShowTasks.vue";
import CreateTask from "./components/Tasks/CreateTask.vue";
import EditTask from "./components/Tasks/EditTask.vue";

// Define Router
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/login', component: Login },
        { path: '/register', component: Register },
        { path: '/tasks', component: ShowTasks },
        { path: '/tasks/create', component: CreateTask },
        { path: '/tasks/:id/edit', component: EditTask },
    ]
});

// Create App
const app = createApp(App);
app.use(router);
app.mount('#app');

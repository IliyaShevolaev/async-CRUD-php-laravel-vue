import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/notes',
        name: 'note.index',
        component: () => import('./components/Note/Index.vue'),
    }, 
    {
        path: '/notes/create',
        name: 'note.create',
        component: () => import('./components/Note/Create.vue'),
    }, 
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
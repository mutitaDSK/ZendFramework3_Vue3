import Vue from 'vue';
import Router from 'vue-router';

import Default from './components/Default.vue';

import Home from './views/Home.vue';
import About from './views/About.vue';
import TestPage from './views/Test.vue';
import PlacePage from './views/Place.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      component: Default,
      children: [
        {
          path: '/',
          name: 'home',
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
          component: Home,
        },
        {
          path: '/about',
          name: 'about',
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
          component: About,
        },
        {
          path: '/test',
          name: 'test',
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
          component: TestPage,
        },
        {
          path: '/restaurants/bangsue',
          name: 'place',
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
          component: PlacePage,
        },
      ],
    },
  ],
});

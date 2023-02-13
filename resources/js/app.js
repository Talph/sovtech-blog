/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import HomeComponent from './components/Front/HomeComponent.vue';
app.component('home-component', HomeComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Frontend
import IndexPostsComponent from './components/Front/Posts/IndexComponent.vue';
app.component('index-front-component', IndexPostsComponent);

import ShowPostsComponent from './components/Front/Posts/ShowComponent.vue';
app.component('index-front-component', ShowPostsComponent);

// Backend

import DashboardComponent from './components/Dashboard/DashboardComponent.vue';
app.component('dashboard-component', DashboardComponent);

import IndexComponent from './components/Dashboard/Posts/IndexComponent.vue';
app.component('index-front-component', IndexComponent);

import ShowComponent from './components/Dashboard/Posts/ShowComponent.vue';
app.component('index-front-component', ShowComponent);

import CreateComponent from './components/Dashboard/Posts/CreateComponent.vue';
app.component('index-front-component', CreateComponent);

import EditPostsComponent from './components/Dashboard/Posts/EditComponent.vue';
app.component('index-front-component', EditPostsComponent);

import IndexCategoryComponent from './components/Dashboard/Category/IndexComponent.vue';
app.component('index-category-component', IndexCategoryComponent);

import ShowCategoryComponent from './components/Dashboard/Category/ShowComponent.vue';
app.component('show-category-component', ShowCategoryComponent);

import IndexUserComponent from './components/Dashboard/Users/IndexComponent.vue';
app.component('index-front-component', IndexUserComponent);

import ShowUserComponent from './components/Dashboard/Users/ShowComponent.vue';
app.component('show-user-component', ShowUserComponent);



// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');

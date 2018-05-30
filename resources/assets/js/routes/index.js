import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Vue.component( 'Hello', require( '../components/Hello.vue' ) ),
        },
        {
            path: '/:id',
            name: 'items',
            component: Vue.component( 'Item', require( '../components/Items.vue' ) ),
            props: true
        }
    ]
})
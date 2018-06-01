<template>
    <div>
        <category-component
                v-for="category in categories"
                :key="category.id"
                :category="category"
        ></category-component>
    </div>
</template>
<script>
import CategoryComponent from './Category.vue';
import Category from '../models/Category';

const axios = require('../libs/axios')();

export default {
    name: 'categories-component',
    data() {
        return {
            categories: [],
        }
    },
    methods: {
        read() {
            axios.get('/api/categories/tree').then(({data}) => {
                Object.values(data.data).forEach(category => {
                    this.categories.push(new Category(category));
                });
            });
        },
    },
    created() {
        this.read();
    },
    components: {
        CategoryComponent,
    }
}
</script>
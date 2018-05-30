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
function Category({id, name, depth, children}) {
    this.id = id;
    this.name = name;
    this.children = children;
    this.depth = depth;
}
import CategoryComponent from './Category.vue';
export default {
    name: 'categories-component',
    data() {
        return {
            categories: [],
        }
    },
    methods: {
        read() {
            window.axios.get('/api/categories/tree').then(({data}) => {
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
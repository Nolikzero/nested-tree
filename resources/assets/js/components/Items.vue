<template>
    <div>
        <item-component
                v-for="item in items"
                :key="item.id"
                :name="item.name"
                :description="item.description"
                :image_url="item.image_url"
                :category_id="item.category_id"
        ></item-component>
    </div>
</template>
<script>
import ItemComponent from './Item.vue';
import Item from '../models/Item';

import { getAxios } from '../libs/axios';
const axios = getAxios();


export default {
    name: 'items-component',
    data() {
        return {
            items: [],
        }
    },
    methods: {
        read() {
            axios.get('/api/categories/'+this.id+'/items').then(({data}) => {
                Object.values(data.data).forEach(item => {
                    this.items.push(new Item(item));
                });
            });
        },
    },
    watch: {
        $route () {
            this.items = [];
            this.read();
        }
    },
    props: [ 'id' ],
    created() {
        this.read();
    },
    components: {
        ItemComponent,
    }
}
</script>
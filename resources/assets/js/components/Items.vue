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
function Item({id, name, description, image_url, category_id}) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.image_url = image_url;
    this.category_id = category_id;
}
import ItemComponent from './Item.vue';
export default {
    name: 'items-component',
    data() {
        return {
            items: [],
        }
    },
    methods: {
        read() {
            window.axios.get('/api/categories/'+this.id+'/items').then(({data}) => {
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
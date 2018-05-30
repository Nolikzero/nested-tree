<template>
    <div class="container">
        <div class="columns is-desktop">
            <div class="column is-one-third">
                <h2 class="title">
                    Categories
                </h2>
                <categories-component></categories-component>
            </div>
            <router-view></router-view>
            <!--<div class="column">
                <h2 class="title">
                    Items
                </h2>
                <item-component
                        v-for="item in items"
                        v-bind="item"
                        :key="item.id"
                ></item-component>
            </div>-->
        </div>
    </div>
</template>

<script>
/*function Category({id, parent_id, lft, rgt, depth}) {
    this.id = id;
    this.parent_id = parent_id;
    this.lft = lft;
    this.rgt = rgt;
    this.depth = depth;
}
function Item({id, name, description, image_url}) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.image_url = image_url;
}*/

import CategoriesComponent from './Categories.vue';
/*import ItemComponent from './Item.vue';*/

export default {
    components: {
        CategoriesComponent,
    }
}
</script>
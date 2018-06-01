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
import CategoriesComponent from './Categories.vue';

export default {
    components: {
        CategoriesComponent,
    }
}
</script>
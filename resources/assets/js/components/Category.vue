<template>
    <div>
        <div class="tree-menu">
            <div class="label-wrapper">
                <div v-bind:style="indent" :class="labelClasses">
                    <i v-if="category.children.length" @click="toggleChildren" class="icon" :class="iconClasses"></i>
                    <router-link :to="{ name: 'items', params: { id: category.id }}">{{ category.name }}</router-link>
                </div>
            </div>
        </div>
        <div v-if="category.children.length">
            <category-component
                    v-if="showChildren"
                    v-for="children in category.children"
                    :category="children"
                    :key="children.id"
                    :name="children.name"
                    :depth="children.depth"
            ></category-component>
        </div>
    </div>
</template>
<script>
export default {
    name: 'category-component',
    data() {
        return {
            showChildren: false
        }
    },
    methods: {
        toggleChildren() {
            this.showChildren = !this.showChildren;
        }
    },
    props: [ 'category' ],
    computed: {
        iconClasses() {
            return {
                'icon-plus': !this.showChildren,
                'icon-minus': this.showChildren
            }
        },
        labelClasses() {
            return { 'has-children': this.category.children.length }
        },
        indent: function() {
            return { 'padding-left': this.category.depth*50+'px' }
            return { 'padding-left': this.category.depth*50+'px' }
        }
    }
}
</script>
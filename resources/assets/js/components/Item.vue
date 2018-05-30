<template>
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img :src="image_url" :alt="name"/>
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">{{ name }}</p>
                </div>
            </div>

            <div class="content">
                {{ description }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'item-component',
    props: [ 'name', 'image_url', 'description', 'category_id'],
}
</script>
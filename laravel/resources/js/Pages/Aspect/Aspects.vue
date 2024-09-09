<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    title: String,
    data: {type: Array || Object, required: true},
})
</script>

<template>
    <div class="aspect-list-contrainer">
        <Head :title="title"/>

        <div v-for="aspect in data" :key="aspect.id">
            <p>id: {{ aspect.id }}</p>
            <p>user_id: {{ aspect.user_id }}</p>
            <p>created: {{ aspect.created_at }}</p>
            <p>updated: {{ aspect.updated_at }}</p>
        </div>
    </div>
</template>


<style lang="scss" scoped>

</style>

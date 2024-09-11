<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    title: String,
    data: {type: Array | Object, required: true},
})
</script>

<template>
    <div class="aspect-list-contrainer">
        <Head :title="title"/>
        <div v-if="data.length !== 0">
            <div v-for="aspect in data" :key="aspect.id">
                <p>id: {{ aspect.id }}</p>
                <p>user_id: {{ aspect.user_id }}</p>
                <p>created: {{ aspect.created_at }}</p>
                <p>updated: {{ aspect.updated_at }}</p>
            </div>
        </div>
        <div v-else class="empty">
            <h2>
                В данный момент у вас нет истории обликов
            </h2>
        </div>
    </div>
</template>


<style lang="scss" scoped>
.empty{
    width: 100%;
    height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
